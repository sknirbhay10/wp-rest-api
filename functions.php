// get dynamic blogs from WordPress Website
function getpost_shortcode() {
	
	$json = file_get_contents('https://example.com/wp-json/wp/v2/posts?per_page=5&_embed&categories=1,6');
	$posts = json_decode($json); // Convert the JSON to an array of posts
	//echo '<pre>';
	//print_r($posts );
	foreach ($posts as $post) {
	echo 'URL: '.$post->link.'<br>';
	echo 'Title: '.$post->title->rendered.'<br>';
	echo $post->_embedded->{'wp:featuredmedia'}[0]->source_url.'<br>';
	echo 'Excerpt: '.$post->excerpt->rendered.'<br>';
	
}
}
add_shortcode('getPosts', 'getpost_shortcode'); 

