<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Sitemap Controller
 * 
 * Controller untuk menghasilkan sitemap dinamis berdasarkan konten website
 */
class Sitemap extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Artikel_model');
    }

    /**
     * Generate sitemap XML
     */
    public function index() {
        // Set header content type
        $this->output->set_content_type('application/xml');
        
        // Load semua artikel untuk sitemap
        $articles = $this->Artikel_model->get_all_articles();
        
        // Base URL
        $base_url = base_url();
        
        // Tanggal hari ini
        $today = date('Y-m-d');
        
        // Mulai XML
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        
        // Halaman utama
        $xml .= $this->_add_url($base_url, $today, 'weekly', '1.0');
        
        // Halaman statis
        $xml .= $this->_add_url($base_url . 'landing/about', $today, 'monthly', '0.8');
        $xml .= $this->_add_url($base_url . 'landing/services', $today, 'monthly', '0.8');
        $xml .= $this->_add_url($base_url . 'landing/artikel', $today, 'weekly', '0.9');
        $xml .= $this->_add_url($base_url . 'landing/contact', $today, 'monthly', '0.7');
        $xml .= $this->_add_url($base_url . 'landing/reservation', $today, 'monthly', '0.9');
        
        // Halaman artikel
        if (!empty($articles)) {
            foreach ($articles as $article) {
                $last_mod = !empty($article->updated_at) ? date('Y-m-d', strtotime($article->updated_at)) : date('Y-m-d', strtotime($article->created_at));
                $xml .= $this->_add_url(
                    $base_url . 'landing/artikel_detail/' . $article->artikel_slug,
                    $last_mod,
                    'monthly',
                    '0.7'
                );
            }
        }
        
        // Tutup XML
        $xml .= '</urlset>';
        
        // Output XML
        echo $xml;
    }
    
    /**
     * Helper untuk menambahkan URL ke sitemap
     */
    private function _add_url($loc, $lastmod, $changefreq, $priority) {
        $url = "  <url>\n";
        $url .= "    <loc>" . htmlspecialchars($loc) . "</loc>\n";
        $url .= "    <lastmod>" . $lastmod . "</lastmod>\n";
        $url .= "    <changefreq>" . $changefreq . "</changefreq>\n";
        $url .= "    <priority>" . $priority . "</priority>\n";
        $url .= "  </url>\n";
        
        return $url;
    }
    
    /**
     * Generate sitemap untuk Google
     */
    public function google() {
        // Redirect ke sitemap utama
        redirect('sitemap');
    }
}
