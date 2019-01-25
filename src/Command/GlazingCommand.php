<?php
namespace Turntable\Command;

use Cake\Console\Arguments;
use Cake\Console\Command;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;
use Composer\Console\Application;

class GlazingCommand extends Command
{
    /**
     * @param ConsoleOptionParser $parser
     *
     * @return \Cake\Console\ConsoleOptionParser|ConsoleOptionParser
     */
    protected function buildOptionParser(ConsoleOptionParser $parser)
    {
        $parser
            ->setDescription('Glaze will symlink the assets from zurb/foundation to the webroot.')
            ->addOption('sass', [
                'short' => 's',
                'help' => 'Symlink sass files',
                'boolean' => true
            ])
            ->addOption('clean', [
                'short' => 'c',
                'help' => 'Unlink asset files',
                'boolean' => true
            ]);

        return $parser;
    }

    /**
     * @param Arguments $args
     * @param ConsoleIo $io
     *
     * @return int|null|void
     */
    public function execute(Arguments $args, ConsoleIo $io)
    {
        try {
            $composerApplication = new Application();
            $composer = $composerApplication->getComposer(false, false);
            $zurbDirectory = $composer->getConfig()
                ->get('vendor-dir') . DIRECTORY_SEPARATOR
                    . 'zurb' . DIRECTORY_SEPARATOR
                    . 'foundation' . DIRECTORY_SEPARATOR;
            $distDirectory = $zurbDirectory . DIRECTORY_SEPARATOR . 'dist' . DIRECTORY_SEPARATOR;
            $symlinkedDirectories = [
                [
                    'zurb' => $distDirectory . 'css',
                    'link' => 'css'
                ],
                [
                    'zurb' => $distDirectory . 'js',
                    'link' => 'js'
                ]
            ];
            $sass = $args->getOption('sass');
            if($sass) {
                if(!is_dir(WWW_ROOT . 'scss')) {
                    mkdir(WWW_ROOT . 'scss');
                }
                array_push($symlinkedDirectories, [
                    'zurb' => $zurbDirectory . DIRECTORY_SEPARATOR . 'scss',
                    'link' => 'scss'
                ]);
            }
            $clean = $args->getOption('clean');
            foreach ($symlinkedDirectories as $directory) {
                $scannedFiles = array_diff(scandir($directory['zurb']), ['..', '.']);
                if(!$clean) {
                    $io->out("Symlinking " . $directory['link']);
                } else {
                    $io->out("Cleaning " . $directory['link']);
                }

                foreach ($scannedFiles as $file) {
                    $target = $directory['zurb'] . DIRECTORY_SEPARATOR . $file;
                    $link = WWW_ROOT . $directory['link'] . DIRECTORY_SEPARATOR . $file;
                    if(file_exists($link)){
                        unlink($link);
                    }
                    if(file_exists($target) && !$clean) {
                        symlink($target, $link);
                    }
                }
            }
            $io->out("Glazing complete.");
        } catch (\Exception $exception) {
            $io->error('How did you get here?');
            $io->error($exception->getMessage());
            $this->abort();
        }
    }
}