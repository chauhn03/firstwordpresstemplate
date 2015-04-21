<?php
/**
	@ Thiet lap cac hang quan trong
	@ THEME_URL = get_styledirectory() - duong dan toi thu muc theme
	@ CORE = thu muc / core cua theme, chua cac file nguon quan trong.
**/
define('THEME_URL', get_stylesheet_directory());
define('CORE', THEME_URL . '/core');
/**
	@ Load file /core/init.php
	@ Day la file cau hinh ban dau cua theme ma se khong nen duoc thay doi sau nay
**/
require(CORE . '/init.php');
/**
	@Thiet lap $content_width chua co du lieu thi gan gia tri cho no
**/
if (!isset($content_width)) {
	/**
	** Neu bien $content_width chua co du lieu thi gan gia tri cho no
	**/
	$content_width = 620;
}
/**
* Thiet lap cac chuc nang se duoc theme ho tro
*/
if (!function_exists('thachpham_theme_setup'))
{
	/**
	* Thiet lap theme co the dich duoc
	*/
	$language_folder = THEME_URL . '/languagues';
	load_theme_textdomain('thachpham', $language_folder);
	/**
	* Tu chen RSS Feed links trong <head>
						*/
				automatic_feed_links();
				/**
				* Them chuc nang post thumnail
				*/
				add_theme_support('post-thumbnails');
				/**
				* Them chuc nang title-tag de tu them <title>
				*/
				add_theme_support('title-tag' );
				/**
				* Them chuc nang post format
				*/
				add_theme_support('post-formats', array('video', 'image', 'audio', 'gallery') );
				/**
				* Them chuc nang custom background
				*/
				$default_background = array('default_color' => '#e8e8e8', );
				add_theme_support('custom-background', $default_background);
				/**
				* Tao menu cho theme
				*/
				register_nav_menu( 'primary-menu', __('Primary Menu', 'thachpham') );
				/**
				* Tao sidebar cho theme
				*/
				/**
				* Creates a sidebar
				* @param string|array  Builds Sidebar based off of 'name' and 'id' values.
				*/
				$sidebar = array(
					'name'          => __( 'Main sidebar', 'thachpham' ),
					'id'            => 'main-sidebar',
					'description'   => 'Main sidebar for ThachPham theme',
					'class'         => 'main-sidebar',
					'before_widget' => '<li id="%1" class="widget %2">',
					'after_widget'  => '</li>',
					'before_title'  => '<h3 class="widgettitle">',
					'after_title'   => '</h3>'
					);
				
				register_sidebar($sidebar);
			}
			
			
if (!function_exists('thachpham_logo'))
{
	function thachpham_logo()
	{ 
?>
	<div class="logo">
		<div class="site-name">
			<?php if (is_home()):
				printf( '<h1><a href="%1$s" title="%2$s">%3$s</a></h1>',
					get_bloginfo( 'url' ),
					get_bloginfo( 'description' ),
					get_bloginfo( 'sitename' )
			);
			?>
			<?php else: ?>
			printf(
			'</p><a href="%1$s" title="%2$s">%3$s</a></p>',
			get_bloginfo( 'url' ),
			get_bloginfo( 'description' ),
			get_bloginfo( 'sitename' )
			);
			<?php endif ?>			
		</div>
		<div class="site-description">
			<?php bloginfo('description'); ?>
		</div>
	</div>
	<?php
	}
	} ?>


<?php if (!function_exists('thachpham_menu'))
{
	function thachpham_menu($slug)
		{
			$menu = array('theme_location' => $slug, 
				'container' => 'nav',
				'container_class' => $slug);

			wp_nav_menu($menu );
		}
}	
?>	