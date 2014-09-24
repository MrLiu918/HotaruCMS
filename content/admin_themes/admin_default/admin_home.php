<?php 
/**
 * Theme name: admin_default
 * Template name: main.php
 * Template author: shibuya246
 *
 * PHP version 5
 *
 * LICENSE: Hotaru CMS is free software: you can redistribute it and/or 
 * modify it under the terms of the GNU General Public License as 
 * published by the Free Software Foundation, either version 3 of 
 * the License, or (at your option) any later version. 
 *
 * Hotaru CMS is distributed in the hope that it will be useful, but WITHOUT 
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or 
 * FITNESS FOR A PARTICULAR PURPOSE. 
 *
 * You should have received a copy of the GNU General Public License along 
 * with Hotaru CMS. If not, see http://www.gnu.org/licenses/.
 * 
 * @category  Content Management System
 * @package   HotaruCMS
 * @author    Hotaru CMS Team
 * @copyright Copyright (c) 2009 - 2013, Hotaru CMS
 * @license   http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link      http://www.hotarucms.org/
 */

// stats
$ui = new UserInfo();
$stats = $ui->stats($h, 'month');

$users = 0;
foreach($stats as $key=>$extClass){ 
	//print_r($extClass); print "<br/>";
        if(in_array('member', $extClass))
        {
//	    print_r($extClass); print "**<br/>";
//	    print $extClass[1];
            $users = $extClass[1];
        }
    }    
    
    $postsAll = $h->post->stats($h, 'total');
    $posts_week = $h->post->stats($h, 'totalweek');
    
    $c = new Comment();	   
    $comments_today = $c->stats($h, 'today');
    var_dump($comments_today);
?>
<div>
    <div class="row">
	
	<div class="col-md-3">
	    <?php if ($stats  != null)  { ?>
		<div class="statbox">
		    <div class="title">
			<span class="label label-success pull-right">Monthly</span>
			<h5><i class="fa fa-users"></i>&nbsp;Users</h5>
		    </div>
		    <div class="content">
			<h1 class="no-margins"><?php echo $users; ?></h1>
    <!--                                <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>-->
			<small>New members</small>
		    </div>
		</div>
	    <?php } else { ?>
		<div class="statbox">
		    <div class="title">
			<span class="label label-warning pull-right"><i class='fa fa-info-circle'></i></span>
			<h5><i class="fa fa-users"></i>&nbsp;Users</h5>
		    </div>
		    <div class="content">
			<h3 class="no-margins">Users plugin is not active</h3>
<!--			<div class="stat-percent font-bold text-navy">24% <i class="fa fa-level-up"></i></div>-->
<!--			<small></small>-->
		    </div>
		</div>
	    <?php } ?>
	</div>
	
	<div class="col-md-3">
	    <?php if ($posts_week  != null)  { ?>
		<div class="statbox">
		    <div class="title">
			<span class="label label-info pull-right">Weekly</span>
			<h5>Posts</h5>
		    </div>
		    <div class="content">
			<h1 class="no-margins"><?php echo $posts_week; ?></h1>
<!--                        <div class="stat-percent font-bold text-info"><?php echo $newpostpercent; ?>% <i class="fa fa-level-up"></i></div>-->
			<small>New posts</small>
		    </div>
		</div>
	    <?php } else { ?>
		<div class="statbox">
		    <div class="title">
			<span class="label label-warning pull-right"><i class='fa fa-info-circle'></i></span>
			<h5>Posts</h5>
		    </div>
		    <div class="content">
			<h3 class="no-margins">Post plugin is not active</h3>
<!--			<div class="stat-percent font-bold text-navy">24% <i class="fa fa-level-up"></i></div>-->
<!--			<small></small>-->
		    </div>
		</div>
	    <?php } ?>
	</div>
	
	<div class="col-md-3">
	    <?php if ($comments_today != null)  { ?>
		<div class="statbox">
		    <div class="title">
			<span class="label label-primary pull-right">Today</span>
			<h5>Comments</h5>
		    </div>
		    <div class="content">
			<h1 class="no-margins"><?php echo $comments_today; ?></h1>
<!--			<div class="stat-percent font-bold text-navy">24% <i class="fa fa-level-up"></i></div>-->
			<small>Comments</small>
		    </div>
		</div>
	    <?php } else { ?>
		<div class="statbox">
		    <div class="title">
			<span class="label label-warning pull-right"><i class='fa fa-info-circle'></i></span>
			<h5>Comments</h5>
		    </div>
		    <div class="content">
			<h3 class="no-margins">Comment plugin is not active</h3>
<!--			<div class="stat-percent font-bold text-navy">24% <i class="fa fa-level-up"></i></div>-->
<!--			<small></small>-->
		    </div>
		</div>
	    <?php } ?>
	</div>
                    
	<div class="col-md-3">
	    <?php
			               
	    $hotaru_latest_version = $h->miscdata('hotaru_latest_version');                
	    if (version_compare($hotaru_latest_version, $h->version) == 1) {
		?>			
		<div class="statbox danger">
		    <div class="title">
			<span class="label label-danger pull-right">Update</span>
			<h5>Software</h5>
		    </div>
		    <div class="content">
			<?php $h->showMessage('A newer version of Hotaru CMS is available, v.' . $hotaru_latest_version . '. <a href="#">upgrade now</a>', 'alert-info');   ?>
		    </div>
		</div>
			
	    <?php			                                                 
	    } else {
		?>			
		<div class="statbox danger">
		    <div class="title">        
			<span class="label label-success pull-right"><i class='fa fa-check'></i></span>
			<h5>Software</h5>
		    </div>
		    <div class="content">
			<div>Hotaru CMS <?php echo $h->version; ?></div>   
			<?php echo $h->lang("admin_theme_version_latest_version_installed"); ?>
		    </div>
		</div>			
	    <?php	                            
	    }
	    ?>
	</div>
    </div>
</div>


<div id="rss-latest" class="col-md-9 well">
	 
<!-- TITLE FOR ADMIN NEWS -->
	<h2>
		<a href="http://feeds2.feedburner.com/hotarucms"><img src="<?php echo SITEURL; ?>content/admin_themes/<?php echo ADMIN_THEME; ?>images/rss_16.png" width="16" height="16" alt="rss" /></a>
		&nbsp;<?php echo $h->lang("admin_theme_main_latest"); ?>
	</h2>
	
	<h3><?php echo $h->lang("admin_theme_main_help"); ?></h3>
	
	<!-- Feed items, number to show content for, max characters for content -->
        <div id="adminNews" style="display:none;"></div>
        <div id="hotaruImg">&nbsp;</div>
	<?php //echo $h->adminNews(10, 3, 300); ?>
	
	<br/>
        <div class="">
            <h2><?php //echo $h->lang("admin_theme_main_join_us"); ?></h2>
         </div>
</div>

<div class="col-md-3">

    <div class="well sidebar-nav">
	
	<ul id="site-stats" class="nav nav-list">
            <li class="nav-header"><?php echo SITE_NAME . " " . $h->lang("admin_theme_main_stats"); ?></li>
		<li>Hotaru CMS <?php echo $h->version; ?></li>   
                               
		<?php                
                        $hotaru_latest_version = $h->miscdata('hotaru_latest_version');                
			if (version_compare($hotaru_latest_version, $h->version) == 1) {
			    //echo "<li><a href='http://hotarucms.org/forumdisplay.php?23-Download-Hotaru-CMS'>" . $h->lang('admin_theme_version_update_to') .  $hotaru_latest_version . "</a></li>";
                            $h->showMessage('A newer version of Hotaru CMS is available, v.' . $hotaru_latest_version . '. <a href="#">upgrade now</a>', 'alert-info');                                                 
                        } else {
                            echo $h->lang("admin_theme_version_latest_version_installed");
                        }
		?>       

		<?php $h->pluginHook('admin_theme_main_stats_post_version'); ?>
		<?php $h->pluginHook('admin_theme_main_stats', 'users', array('users' => array('all', 'admin', 'supermod', 'moderator', 'member', 'undermod', 'pending', 'banned', 'killspammed'))); ?>
		<?php $h->pluginHook('admin_theme_main_stats', 'post_manager', array('posts' => array('all', 'approved', 'pending', 'buried', 'archived'))); ?>
		<?php $h->pluginHook('admin_theme_main_stats', 'comments', array('comments' => array('all', 'approved', 'pending', 'archived'))); ?>
	</ul>
    </div>
</div>

<script type='text/javascript'>
jQuery(window).load(function() {        
        
        var sendurl = "<?php echo SITEURL; ?>admin_index.php?page=admin_news";
        
        $.ajax(
            {
            type: 'get',
                    url: sendurl,
                    cache: false,
                    //data: formdata,
                    beforeSend: function () {
                                    //$('#adminNews').html('<img src="' + SITEURL + "content/admin_themes/" + ADMIN_THEME + 'images/ajax-loader.gif' + '"/>&nbsp;Loading latest news.<br/>');
                            },
                    error: 	function(XMLHttpRequest, textStatus, errorThrown) {
                                    $('#adminNews').html('ERROR');
                                    $('#adminNews').removeClass('power_on').addClass('warning_on');
                    },
                    success: function(data) { // success means it returned some form of json code to us. may be code with custom error msg                                                                               
                                    $('#adminNews').html(data).fadeIn("fast");
                                    $('#hotaruImg').fadeOut("slow");
                                     
                    },
                    dataType: "html"
    });
});
</script>