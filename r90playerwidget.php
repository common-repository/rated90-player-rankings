<?php
/*
Plugin Name: Rated90 Player Rankings Plugin
Plugin URI: http://rated90.com/get-the-widget
Description: The Official Rated90 Player World Ranking Widget. Woot!
Version: 1.0
Author: Rated90
Author URI: http://rated90.com
License: GPL2
*/

class Rated90_Player_Rankings extends WP_Widget {

	public function __construct() {
		parent::__construct(
	 		'rated90_player_rankings', // Base ID
			'Rated90 Player Rankings', // Name
			array( 'description' => __( 'Rated90 Player Rankings', 'text_domain' ), ) // Args
		);
	}
	
	public static $leagues = array(
			'9' => 'Bundesliga',
			'8' => 'EPL',
			'109' => 'J League',
			'7' => 'La Liga',
			'16' => 'Ligue',
			'33' => 'MLS',
			'13' => 'Serie A'
		);
		
	public static $teams = array(
			'900' => 'AC Ajaccio',
			'1240' => 'AC Milan',
			'1333' => 'Albirex Niigata',
			'660' => 'Arsenal',
			'1241' => 'AS Roma',
			'665' => 'Aston Villa',
			'1255' => 'Atalanta Bergamo',
			'2019' => 'Athletic Bilbao',
			'2020' => 'Atlético Madrid',
			'1338' => 'Avispa Fukuoka',
			'2017' => 'Barcelona',
			'882' => 'Bastia',
			'963' => 'Bayer Leverkusen',
			'961' => 'Bayern München',
			'1249' => 'Bologna',
			'891' => 'Bordeaux',
			'964' => 'Borussia Dortmund',
			'971' => 'Borussia M\'gladbach',
			'1256' => 'Cagliari',
			'1267' => 'Catania',
			'3842' => 'CD Chivas USA',
			'2003' => 'Celta Vigo',
			'1335' => 'Cerezo Osaka',
			'661' => 'Chelsea',
			'2273' => 'Chicago Fire',
			'1248' => 'Chievo Verona',
			'2278' => 'Colorado Rapids',
			'2280' => 'Columbus Crew',
			'2925' => 'Croix de Savoie 74 Gaillard',
			'2277' => 'DC United',
			'2004' => 'Deportivo La Coruna',
			'1003' => 'Eintracht Frankfurt',
			'2032' => 'Espanyol',
			'674' => 'Everton',
			'1000' => 'FC Augsburg',
			'3841' => 'FC Dallas',
			'1259' => 'Fiorentina',
			'1004' => 'Fortuna Dusseldorf',
			'977' => 'FSV Mainz 05',
			'667' => 'Fulham',
			'1327' => 'Gamba Osaka',
			'1276' => 'Genoa',
			'2039' => 'Getafe',
			'99' => 'Global',
			'7072' => 'Granada CF',
			'967' => 'Hamburger SV',
			'972' => 'Hannover 96',
			'1001' => 'Hoffenheim',
			'6422' => 'Houston Dynamo',
			'1244' => 'Inter Milan',
			'1320' => 'Jubilo Iwata',
			'1242' => 'Juventus',
			'1324' => 'Kashima Antlers',
			'1331' => 'Kashiwa Reysol',
			'1336' => 'Kawasaki Frontale',
			'1245' => 'Lazio Roma',
			'42' => 'Legends',
			'895' => 'Lille',
			'663' => 'Liverpool',
			'907' => 'Lorient',
			'2272' => 'Los Angeles Galaxy',
			'2024' => 'Málaga',
			'2027' => 'Mallorca',
			'676' => 'Manchester City',
			'662' => 'Manchester United',
			'1337' => 'Montedio Yamagata',
			'906' => 'Montpellier HSC',
			'2006' => 'Montreal Impact',
			'1325' => 'Nagoya Grampus',
			'911' => 'Nancy',
			'1270' => 'Napoli',
			'2279' => 'NE Revolution',
			'6571' => 'New York Red Bulls',
			'664' => 'Newcastle United',
			'894' => 'Nice',
			'677' => 'Norwich City',
			'975' => 'Nürnberg',
			'884' => 'Olympique Lyon',
			'890' => 'Olympique Marseille',
			'1339' => 'Omiya Ardija',
			'2022' => 'Osasuna',
			'1254' => 'Palermo',
			'1243' => 'Parma',
			'1294' => 'Pescara',
			'14575' => 'Philadelphia Union',
			'17501' => 'Portland Timbers',
			'886' => 'PSG',
			'702' => 'Queens Park Rangers',
			'2054' => 'Rayo Vallecano Madrid',
			'0' => 'Reading',
			'2025' => 'Real Betis',
			'2016' => 'Real Madrid',
			'3843' => 'Real Salt Lake',
			'2028' => 'Real Sociedad de Fútbol',
			'2030' => 'Real Zaragoza',
			'880' => 'Remis',
			'901' => 'Saint &#201;tienne',
			'1295' => 'Sampdoria',
			'2276' => 'San Jose Earthquakes',
			'1334' => 'Sanfrecce Hiroshima',
			'970' => 'SC Freiburg',
			'966' => 'Schalke 04',
			'13024' => 'Seattle Sounders',
			'2021' => 'Sevilla',
			'1329' => 'Shimizu S Pulse',
			'1252' => 'Siena',
			'887' => 'Sochaux',
			'1' => 'Southampton',
			'2274' => 'Sporting Kansas City',
			'1002' => 'spVgg Greuther Furth',
			'922' => 'Stade Brestois 29',
			'893' => 'Stade Rennes',
			'690' => 'Stoke City',
			'683' => 'Sunderland',
			'738' => 'Swansea City',
			'1296' => 'Torino',
			'7977' => 'Toronto',
			'675' => 'Tottenham Hotspur',
			'899' => 'Toulouse',
			'881' => 'Troyes',
			'2036' => 'UD Levante Valencia',
			'1246' => 'Udinese',
			'1323' => 'Urawa RD',
			'2015' => 'Valencia',
			'933' => 'Valenciennes',
			'2005' => 'Valladolid',
			'17500' => 'Vancouver Whitecaps',
			'1344' => 'Vegalta Sendai',
			'1342' => 'Ventforet Kofu',
			'962' => 'VfB Stuttgart',
			'968' => 'VfL Wolfsburg',
			'1328' => 'Vissel Kobe',
			'960' => 'Werder Bremen',
			'678' => 'West Bromwich Albion',
			'2' => 'West Ham United',
			'686' => 'Wigan Athletic',
			'1322' => 'Yokohama F Marinos',
		);
	
	public function widget($args, $instance){
		if ($instance['type'] == ''){
			$type = 'world';
		}
		else {
			$type = $instance['type'];
		}
		if ($type == 'league'){
			if ($instance['league'] == ''){
				$modifier = '33';
			}
			else {
				$modifier = $instance['league'];
			}
		}
		if ($type == 'team'){
			if ($instance['team'] == ''){
				$modifier = '662';
			}
			else {
				$modifier = $instance['team'];
			}
		}
		
		$links = get_option('rated90_player_rankings_links');
		$brand = get_option('rated90_player_rankings_powered');
		$feed = json_decode(file_get_contents('http://rated90.com/feed/wordpress_player_widget?links='.$links.'&brand='.$brand.'&type='.$type.'&modifier='.$modifier));
		
		if ($type == 'league'){
			$title = Rated90_Player_Rankings::$leagues[$modifier].' Player';
		}
		else if ($type == 'team'){
			$title = Rated90_Player_Rankings::$teams[$modifier].' Player';
		}
		else {
			$title = 'World Player';
		}
		$output = array();
		$output[] = '<div class="r90pwidget"><div><p>'.$title.'</p><p>Rankings</p></div><table><thead><tr><th class="r90pwidgetrank">Rank</th><th class="r90pwidgetname">Player Name</th><th class="r90pwidgetrating">Rating</th></tr></thead><tbody>';
		if (!empty($feed)){
			$i = 1;
			foreach ($feed->result as $player){
				if ($links == 'yes'){
					$output[] = '<tr><td id="r90pwidgetrank'.$i.'" class="r90pwidgetrank"><span>'.$i.'</span></td><td class="r90pwidgetname"><a href="http://rated90.com/player/select/'.$player->url.'/?utm_source=widget&utm_medium=widget&utm_campaign=widget" target="_blank">'.$player->name.'</a></td><td class="r90pwidgetrating">'.$player->rating.'</td></tr>';
				}
				else {
					$output[] = '<tr><td id="r90pwidgetrank'.$i.'" class="r90pwidgetrank"><span>'.$i.'</span></td><td class="r90pwidgetname">'.$player->name.'</td><td class="r90pwidgetrating">'.$player->rating.'</td></tr>';
				}
				$i++;
			}
		}
		$output[] = '</tbody></table><div>';
		if ($brand == 'yes'){
			$output[] = '<p><a href="http://rated90.com/rankings/footballers/" title="Rated90 Player Ratings">See more rankings at <strong>Rated90.com</strong></a></p>';
		}
		$output[] = '</div></div>';
		echo join('',$output);
	}
	
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['type'] = strip_tags( $new_instance['type'] );
		$instance['league'] = strip_tags( $new_instance['league'] );
		$instance['team'] = strip_tags( $new_instance['team'] );
		return $instance;
	}
	
	public function form($instance){ 
		if ( isset( $instance['type'])){
			$type = $instance['type'];
		}
		else {
			$type = __('world','text_domain');
		}
		
		if ( isset( $instance['league'])){
			$league = $instance['league'];
		}
		else {
			$league = __('league','text_domain');
		}
		
		if ( isset( $instance['team'])){
			$team = $instance['team'];
		}
		else {
			$team = __('team','text_domain');
		}
		
		?>
		
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Type of data:' ); ?></label></p>
		<p><input id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" style="margin-right: 4px;" type="radio" value="world" <?php if($type == 'world'){ echo 'checked="checked"';} ?> />World Rank</p>
		<p><input id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" style="margin-right: 4px;" type="radio" value="league" <?php if($type == 'league'){ echo 'checked="checked"';} ?> />League Specific
		<select name="<?php echo $this->get_field_name( 'league' ); ?>" id="<?php echo $this->get_field_id( 'league' ); ?>">
			<option>Choose a league</option>
			<?php
				foreach (Rated90_Player_Rankings::$leagues as $key=>$value){
					
					if ($key == $league){
						echo '<option value="'.$key.'" selected="selected">'.$value.'</option>';
					}
					else {
						echo '<option value="'.$key.'">'.$value.'</option>';
					}
				}
			?>
		</select>
		</p>
		<p><input id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" style="margin-right: 4px;" type="radio" value="team" <?php if($type == 'team'){ echo 'checked="checked"';} ?> />Team Specific
		<select name="<?php echo $this->get_field_name( 'team' ); ?>" id="<?php echo $this->get_field_id( 'team' ); ?>">
			<option>Choose a team</option>
			<?php
				foreach (Rated90_Player_Rankings::$teams as $key=>$value){
					
					if ($key == $team){
						echo '<option value="'.$key.'" selected="selected">'.$value.'</option>';
					}
					else {
						echo '<option value="'.$key.'">'.$value.'</option>';
					}
				}
			?>
		</select>
		</p>
	<?php }

}



function rated90_player_rankings() {
	add_options_page( 'Options', 'Rated90 Players', 'manage_options', 'rated90_player_rankings', 'rated90_player_rankings_options' );
}

function rated90_player_rankings_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	?>
	<style type="text/css">
		.wrap {background: url(<?php echo plugins_url('images/rated90.header.slice.jpg', __FILE__)?>) repeat-x top left;}
		.wrap h1 {padding: 20px;}
		.wrap form {margin: 10px 0 0 10px;}
		.wrap form p {float: left; clear: left; margin: 0 0 6px 0;}
		.wrap label {float: left; clear: left;}
		.wrap input {float: left;}
		.wrap label + input {margin: 2px 0 0 6px;}
		.wrap #submit {clear: left; margin: 6px 0 0 0;}
		.wrap form + h2 {clear: left; float: left; margin: 30px 0 0 0;}
		.wrap h2 + p {clear: left;}
	</style>
	<div class="wrap">
	<h1><img src="<?php echo plugins_url('images/rated90.logo.png', __FILE__)?>" /></h1>
	<h2>Welcome to the Rated90 Players Ranking Widget</h2>
	<?php
	if (!empty($_POST)){
		update_option( 'rated90_player_rankings_links', $_POST['links'] );
		update_option( 'rated90_player_rankings_powered', $_POST['brand'] );
	?>
	<div class="updated"><p><strong><?php _e('Settings saved.', 'rated90-player-rankings' ); ?></strong></p></div>
	<?php }
	$links = get_option( 'rated90_player_rankings_links' );
	$brand = get_option( 'rated90_player_rankings_powered' );
	?>
	
	
	<form method="post" action="">
		<p><label for="links">Enable player links</label><input type="checkbox" name="links" value="yes" id="links" <?php if ($links == 'yes'){echo 'checked="checked"';} ?> /></p>
		<p><label for="brand">Enable Rated90 link in widget footer</label><input type="checkbox" name="brand" value="yes" id="brand" <?php if ($brand == 'yes'){echo 'checked="checked"';} ?> /></p>
		<p><input type="submit" name="submit" id="submit" value="Submit Changes" /></p>
	</form>
	<h2>Become a Rated90 Partner!</h2>
	<p>By installing this plugin and placing at least one widget in your sidebar, you become eligible* to become a Rated90 partner. To become a partner, simply place the widget in a sidebar, enable both the options (Enable player links AND Enable Rated90 link in widget footer). Then just send us an email at <a href="mailto:support@rated90.com">support@rated90.com</a> with your domain name. Once your site is reviewed, a link and short description for your site will be placed on our site at <a href="http://rated90.com/partners" target="_blank">http://rated90.com/partners</a>!</p>
	<small>*Fulfilling the eligibility requirements as stated above does not guarantee that this site will be accepted as a Rated90 Partner. Rated90 reserves the right to reject sites as partners if it deems the content of the site inappropriate or in any way malicious to potential Rated90 users.</small>
	</div>
<?php
}

// Add menu
add_action( 'admin_menu', 'rated90_player_rankings' );


// Register widget
add_action( 'widgets_init', create_function( '', 'register_widget( "Rated90_Player_Rankings" );' ) );

// Add option for linking to player pages
add_option('rated90_player_rankings_links', 'no');

// Add option for linking the powered by graphic
add_option('rated90_player_rankings_powered', 'no');

// Register stylesheet for widget
add_action( 'wp_enqueue_scripts', 'rated90_player_rankings_stylesheet' );
function rated90_player_rankings_stylesheet() {
    wp_register_style( 'rated90_player_rankings-style', plugins_url('playerwidget.css', __FILE__) );
    wp_register_style( 'rated90_player_rankings-font', 'http://fonts.googleapis.com/css?family=Ubuntu:400,700' );
    wp_enqueue_style( 'rated90_player_rankings-style' );
    wp_enqueue_style( 'rated90_player_rankings-font' );
}

?>