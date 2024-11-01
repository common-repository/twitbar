<?php
/*
Plugin Name: Twitbar Widget
Plugin URI:  http://blog.indeedle.com/twitbar-113/
Description: A twitter widget that adds the code needed to create a Twitter sidebar
Author: C. Finegan
Version: 0.0.7
Author URI: http://www.indeedle.com/
*/

add_action("plugins_loaded", "twitBar_init");

function twitBar($username='', $twitlimit=5, $followText='')
{
	echo '<div id="twitter_div">';
	echo '<ul id="twitter_update_list"></ul>';
	if($followText != '')
		echo '<p style="display:block;text-align:right;font-size:smaller;"><a href="http://twitter.com/'.$username.'" id="twitter-link">'.$followText.'</a></p>';
	echo '</div>';
	
	add_action('wp_footer', 'twitBar_callfooter');
}

function twitBar_callfooter()
{
	// Add the script to the footer
	$options = get_option("widget_twitBar");
	
	echo '<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>';
	echo '<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/'.$options['username'].'.json?callback=twitterCallback2&amp;count='.$options['twitlimit'].'"></script>';
}

function widget_twitBar($args) 
{
	extract($args);
	$options = get_option("widget_twitBar");
	
	echo $before_widget;
	echo $before_title;?><?php echo $options['title'];?><?php echo $after_title;
	twitBar($options['username'], $options['twitlimit'], $options['followtext']);
	echo $after_widget;
}

function twitBar_init()
{
	register_sidebar_widget(__('TwitBar', 'twitbar'), 'widget_twitBar');
	register_widget_control(   'TwitBar', 'twitBar_control');
}

function twitBar_control()
{
	$options = get_option("widget_twitBar");

	if (!is_array( $options ))
	{
		$options = array(
			'title' => 'Twittering',
			'username' => '',
			'twitlimit' => '5',
			'followtext' => 'follow me on Twitter',
		);
	} 

	if ($_POST['twitBar-Submit'])
	{
		$options['title'] = htmlspecialchars($_POST['twitBar-WidgetTitle']);
		$options['username'] = htmlspecialchars(strtolower(str_replace(array("\n", "\r", "\t", " ", "\o", "\xOB"), '', $_POST['twitBar-TwitterName'])));
		$options['twitlimit'] = htmlspecialchars($_POST['twitBar-TwitLimit']);
		$options['followtext'] = htmlspecialchars($_POST['twitBar-FollowText']);

		update_option("widget_twitBar", $options);
	}

?>
  <p>
    <label for="twitBar-WidgetTitle"><?php _e("Title:", 'twitbar'); ?></label><br />
    <input type="text" id="twitBar-WidgetTitle" name="twitBar-WidgetTitle" value="<?php echo $options['title'];?>" />
  </p>
  <p>
    <label for="twitBar-TwitterName"><?php _e("Twitter Name:", 'twitbar'); ?></label><br />
    <input type="text" id="twitBar-TwitterName" name="twitBar-TwitterName" value="<?php echo $options['username'];?>" />
  </p>
  <p>
    <label for="twitBar-FollowText"><?php _e("Follow Text:", 'twitbar'); ?></label><br />
    <input type="text" id="twitBar-FollowText" name="twitBar-FollowText" value="<?php echo $options['followtext'];?>" />
  </p>
  <p>
    <label for="twitBar-TwitLimit"><?php _e("Number to Show:", 'twitbar'); ?></label><br />
    <select id="twitBar-TwitLimit" name="twitBar-TwitLimit">
		<?php $min = 1; $max = 20;
			for($i = $min; $i <= $max; $i++)
			{
				?><option value="<?php echo $i; ?>"<?php if($i == $options['twitlimit']){ echo ' selected'; } ?>><?php echo $i; ?></option>
		<?php } ?>
	<input type="hidden" id="twitBar-Submit" name="twitBar-Submit" value="1" />
  </p>
<?php
}
?>