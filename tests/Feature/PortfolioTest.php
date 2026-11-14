<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class PortfolioTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
    }

    public function test_home_page_displays_portfolio_sections_and_assets(): void
    {
        $response = $this->get('/');

        $response->assertOk()
            ->assertSee('Ahmad Dhio Baehaqi')
            ->assertSee('PERSONAL PORTFOLIO')
            ->assertSee('Lulusan S1 Teknik Informatika')
            ->assertSee('Lihat Proyek')
            ->assertSee('Web Development')
            ->assertSee('Administrasi dan Operasional')
            ->assertSee('Tools dan Teknologi')
            ->assertSee('Soft Skills')
            ->assertDontSee('PORTOFOLIO PROFESIONAL')
            ->assertDontSee('01 /')
            ->assertSee('Sekolah Tinggi Teknologi Mandala')
            ->assertSee('PT Pindad')
            ->assertSee('POS Kuliner AI')
            ->assertSee('CASHLY')
            ->assertSee('BREWHAUS')
            ->assertSee('Kasir Toko')
            ->assertSee('Rello The Cafe House')
            ->assertSee('Cordova Living House')
            ->assertSee('assets/profile.jpg.jpeg')
            ->assertSee('assets/pos-kuliner.jpg.jpeg')
            ->assertDontSee('Unduh CV')
            ->assertDontSee('CV Profesional')
            ->assertDontSee('CV ATS Friendly')
            ->assertDontSee('cv.download')
            ->assertSee('mailto:ahmaddhiob@gmail.com');
    }

    public function test_cv_download_routes_are_not_available(): void
    {
        $this->assertFalse(Route::has('cv.download'));
        $this->get('/cv/profesional')->assertNotFound();
        $this->get('/cv/ats')->assertNotFound();

        foreach (['cv-profesional.pdf', 'cv-ats.pdf'] as $filename) {
            $this->assertFileDoesNotExist(public_path('assets/'.$filename));
        }

        $this->get('/assets/cv-profesional.pdf')->assertNotFound();
        $this->get('/assets/cv-ats.pdf')->assertNotFound();
        $this->get('/storage/cv/cv-profesional.pdf')->assertForbidden();
        $this->get('/storage/cv/cv-ats.pdf')->assertForbidden();
    }
}
