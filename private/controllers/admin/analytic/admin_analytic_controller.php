<?php
class Admin_Analytic_Controller extends Admin_Controller {
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        $this->title .= ' | Analytics';
    
        
        $this->header_view->active_link = 'analytics';
    }
    
    protected function content_view() {
        $analytics = Analytic_Model::find_all();
        $this->content_view->analytics = $analytics;
        
        $total_visits = Analytic_Model::get_total_visits();
        echo 'Total Visits: ' . $total_visits . "<br />";
        
        $total_plays = Analytic_Model::get_total_plays();
        echo 'Total Plays: ' . $total_plays . "<br />";
        
        $total_desktop = Analytic_Model::get_total_desktop();
        echo 'Total Desktop Visits: ' . $total_desktop . "<br />";
        
        $total_mobile = Analytic_Model::get_total_mobile();
        echo 'Total Mobile Visits: ' . $total_mobile . "<br />";
        
        $total_plays_1 = Analytic_Model::get_plays_by_track(1);
        echo 'Track Plays (1): ' . $total_plays_1 . "<br />";
        
        $total_plays_2 = Analytic_Model::get_plays_by_track(2);
        echo 'Track Plays (2): ' . $total_plays_2 . "<br />";
        
        $total_plays_3 = Analytic_Model::get_plays_by_track(3);
        echo 'Track Plays (3): ' . $total_plays_3 . "<br />";
        
        $total_plays_4 = Analytic_Model::get_plays_by_track(4);
        echo 'Track Plays (4): ' . $total_plays_4 . "<br />";
        
        $total_plays_5 = Analytic_Model::get_plays_by_track(5);
        echo 'Track Plays (5): ' . $total_plays_5 . "<br />";
        
        $total_plays_6 = Analytic_Model::get_plays_by_track(6);
        echo 'Track Plays (6): ' . $total_plays_6 . "<br />";
        
        $total_downloads_1 = Analytic_Model::get_downloads_by_filename('drvgs.mp3');
        echo 'Track Downloads (drvgs.mp3): ' . $total_downloads_1 . "<br />";
        
        die();
        
        return $this->content_view->capture('admin_analytic_view.php');
    }
    
}
?>