<?php

namespace Turntable\Test\TestCase\Command;

use Cake\TestSuite\ConsoleIntegrationTestTrait;
use Cake\TestSuite\TestCase;
use Composer\Composer;
use Composer\Console\Application;

class GlazeCommandTest extends TestCase
{
    use ConsoleIntegrationTestTrait;

    /**
     * @var Composer
     */
    protected $composer;

    /**
     * @var string
     */
    protected $zurbDirectory;

    /**
     * Test setup
     */
    public function setUp()
    {
        parent::setUp();
        $this->useCommandRunner();
        try {
            $composerApplication = new Application();
            $this->composer = $composerApplication->getComposer(false, false);
            $this->zurbDirectory = $this->composer->getConfig()->get('vendor-dir') . DIRECTORY_SEPARATOR . 'zurb' . DIRECTORY_SEPARATOR . 'foundation' . DIRECTORY_SEPARATOR;
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }

    /**
     * Test description output
     */
    public function testDescriptionOutput()
    {
        $this->exec('glaze --help');
        $this->assertOutputContains('Glaze will symlink the assets from zurb/foundation to the webroot.');
    }

    /**
     * Test the symlinking of css files
     */
    public function testSymlinkCss()
    {
        $this->exec('glaze');
        $this->assertOutputContains('Glazing complete.');
        $this->assertOutputContains('Symlinking css');
        $scannedCss = array_diff(scandir($this->zurbDirectory . 'dist' . DIRECTORY_SEPARATOR . 'css'), ['..', '.']);
        foreach ($scannedCss as $css) {
            $this->assertFileExists(WWW_ROOT . 'css' . DIRECTORY_SEPARATOR . 'foundation' . DIRECTORY_SEPARATOR . $css);
        }
    }

    /**
     * Test cleaning of symlinked css files
     */
    public function testCleanCss()
    {
        $this->exec('glaze -c');
        $this->assertOutputContains('Glazing complete.');
        $this->assertOutputContains('Cleaning css');
        $scannedCss = array_diff(scandir($this->zurbDirectory . 'dist' . DIRECTORY_SEPARATOR . 'css'), ['..', '.']);
        foreach ($scannedCss as $css) {
            $this->assertFileNotExists(WWW_ROOT . 'css' . DIRECTORY_SEPARATOR . 'foundation' . DIRECTORY_SEPARATOR . $css);
        }
    }

    /**
     * Test symlinking of js files
     */
    public function testSymlinkJs()
    {
        $this->exec('glaze');
        $this->assertOutputContains('Glazing complete.');
        $this->assertOutputContains('Symlinking js');
        $scannedJs = array_diff(scandir($this->zurbDirectory . 'dist' . DIRECTORY_SEPARATOR . 'js'), ['..', '.']);
        foreach ($scannedJs as $js) {
            $this->assertFileExists(WWW_ROOT . 'js' . DIRECTORY_SEPARATOR . 'foundation' . DIRECTORY_SEPARATOR . $js);
        }
    }

    /**
     * Test cleaning of symlinked js files
     */
    public function testCleanJs()
    {
        $this->exec('glaze -c');
        $this->assertOutputContains('Glazing complete.');
        $this->assertOutputContains('Cleaning js');
        $scannedJs = array_diff(scandir($this->zurbDirectory . 'dist' . DIRECTORY_SEPARATOR . 'js'), ['..', '.']);
        foreach ($scannedJs as $js) {
            $this->assertFileNotExists(WWW_ROOT . 'js' . DIRECTORY_SEPARATOR . 'foundation' . DIRECTORY_SEPARATOR . $js);
        }
    }

    /**
     * Test symlinking of scss files
     */
    public function testSymlinkScss()
    {
        $this->exec('glaze -s');
        $this->assertOutputContains('Glazing complete.');
        $this->assertOutputContains('Symlinking scss');
        $scannedScss = array_diff(scandir($this->zurbDirectory . 'scss'), ['..', '.']);
        foreach ($scannedScss as $scss) {
            $this->assertFileExists(WWW_ROOT . 'scss' . DIRECTORY_SEPARATOR . 'foundation' . DIRECTORY_SEPARATOR . $scss);
        }
    }

    /**
     * Test cleaning of symlinked scss files
     */
    public function testCleanScss()
    {
        $this->exec('glaze -c -s');
        $this->assertOutputContains('Glazing complete.');
        $this->assertOutputContains('Cleaning scss');
        $scannedScss = array_diff(scandir($this->zurbDirectory . 'scss'), ['..', '.']);
        foreach ($scannedScss as $scss) {
            $this->assertFileNotExists(WWW_ROOT . 'scss' . DIRECTORY_SEPARATOR . 'foundation' . DIRECTORY_SEPARATOR . $scss);
        }
    }
}
