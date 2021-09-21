<?php
/*---------------------------------------------------------------------------
 * リフォームのカスタムフィールド
 *---------------------------------------------------------------------------*/

class Works_Custom_Field {

	private $notice_posts    = array();
	private $current_post_id = 0;
	private $works           = array(
		'notice_post_id' => 0,
		'type'           => '',
		'product_url'    => '',
	);

	public function __construct() {
		add_action( 'admin_head', array( $this, 'get_works_data' ), 10 );
		add_action( 'admin_menu', array( $this, 'register_meta_box' ) );
		add_action( 'save_post', array( $this, 'update_works' ), 10, 2 );
	}

	public function register_meta_box(): void {
		add_meta_box( 'works-meta', 'Meta', array( $this, 'works_meta' ), 'works', 'advanced', 'high' );
	}

	public function get_works_data(): void {
		if ( ! $this->is_post_type_admin_works() ) {
			return;
		}

		$this->current_post_id = isset( $_GET['post'] ) ? $_GET['post'] : 0;
		$this->works           = $this->get_works_meta();
		$this->notice_posts    = $this->get_notice_posts();
	}

	public function get_works_meta(): array {
		$works_meta = get_post_meta( $this->current_post_id, 'works', true );
		return wp_parse_args( $works_meta, $this->works );
	}

	public function get_notice_posts(): array {

		$args = array(
			'posts_per_page' => -1,
			'post_type'      => 'post',
			'post_status'    => 'any',
			'tag_slug__and'  => array( 'notice' ),
		);
		return get_posts( $args );
	}

	private function is_post_type_admin_works(): bool {
		global $pagenow, $typenow;
		if ( 'works' === $typenow && 'post.php' === $pagenow ) {
			return true;
		}
		return false;
	}

	public function works_meta(): void { ?>

<table class="form-table">
	<tbody>
		<tr>
			<th>Notice post</th>
			<td>
				<select name="works[notice_post_id]">
					<option value="">Select post</option>
					<?php foreach ( $this->notice_posts as $post ) : ?>
					<option value="<?php echo esc_attr( $post->ID ); ?>" <?php echo esc_attr( $post->ID === (int) $this->works['notice_post_id'] ? 'selected' : '' ); ?>><?php echo esc_html( $post->post_title ); ?></option>
					<?php endforeach; ?>
				</select>
			</td>
		</tr>
		<tr>
			<th>Type</th>
			<td><input type="text" name="works[type]" id="" class="regular-text" value="<?php echo esc_attr( $this->works['type'] ); ?>"></td>
		</tr>
		<tr>
			<th>Product URL</th>
			<td><input type="text" name="works[product_url]" id="" class="regular-text" value="<?php echo esc_attr( $this->works['product_url'] ); ?>"></td>
		</tr>
	<tbody>
</table>


<?php
	}

	public function update_works( $post_id ): void {
		if ( isset( $_POST['works'] ) ) {
			update_post_meta( $post_id, 'works', $_POST['works'] );
		}
	}

}
