<?php
$post_title = get_the_title();
$url        = get_permalink();
?>
<div class="share">
	<a href="<?php echo esc_url( 'https://twitter.com/intent/tweet?via="thisissimmon"&text=' . $post_title . '&url=' . rawurlencode( $url ) ); ?>" target="_blank" rel="noopener noreferrer" class="share__button share__button--twitter"></a>
	<a href="<?php echo esc_url( 'https://social-plugins.line.me/lineit/share?url=' . rawurlencode( $url ) ); ?>" target="_blank" rel="noopener noreferrer" class="share__button share__button--line"></a>
	<a href="<?php echo esc_url( 'https://getpocket.com/edit?url=' . rawurlencode( $url ) ); ?>" target="_blank" rel="noopener noreferrer" class="share__button share__button--pocket"></a>
	<a href="<?php echo esc_url( 'https://www.facebook.com/sharer/sharer.php?u=' . rawurlencode( $url ) ); ?>" target="_blank" rel="noopener noreferrer" class="share__button share__button--facebook"></a>
	<a href="<?php echo esc_url( 'https://b.hatena.ne.jp/add?mode=confirm&url=' . rawurlencode( $url ) ); ?>" target="_blank" rel="noopener noreferrer" class="share__button share__button--hatena"></a>
</div>
