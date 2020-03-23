<?php
/**
 * Class HTML Helpers Test
 *
 * @package Dlb_Helpers
 */

/**
 * Sample test case.
 */
class HtmlHelpersTest extends WP_UnitTestCase {

	// input
	public function test_get_text_input_markup_without_params() {
        
        $html = new Delabon\Helpers\Html();

        $markup = $html->input();

		$this->assertEquals( $markup, '<input type="text" class="dlb-input dlb-input-text">' );
	}

	public function test_get_input_markup_with_params() {
        
        $html = new Delabon\Helpers\Html();

        $markup = $html->input([
			'type' => 'email',
			'class' => '__extra_class',
			'placeholder' => 'Title goes here',
			'data-id' => 1,
		]);

		$this->assertEquals( $markup, '<input type="email" class="dlb-input dlb-input-email __extra_class" placeholder="Title goes here" data-id="1">' );
	}

	// title
	public function test_get_title_markup() {
        
        $html = new Delabon\Helpers\Html();

        $markup = $html->title('Title');

		$this->assertEquals( $markup, '<h3 class="dlb-input-title">Title</h3>' );
	}

	public function test_get_title_markup_with_params() {
        
        $html = new Delabon\Helpers\Html();

        $markup = $html->title(
			'Title',
			[
				'class' => '__extra_class',
				'data-id' => 2,
			]
		);

		$this->assertEquals( $markup, '<h3 class="dlb-input-title __extra_class" data-id="2">Title</h3>' );
	}

	public function test_get_empty_title_markup() {
        
        $html = new Delabon\Helpers\Html();

        $markup = $html->title('');

		$this->assertEquals( $markup, '' );
	}

	// description
	public function test_get_description_markup() {
        
        $html = new Delabon\Helpers\Html();

        $markup = $html->description('Description text');

		$this->assertEquals( $markup, '<p class="dlb-input-description">Description text</p>' );
	}

	public function test_get_empty_description_markup() {
        
        $html = new Delabon\Helpers\Html();

        $markup = $html->description('');

		$this->assertEquals( $markup, '' );
	}

	public function test_get_description_markup_with_params() {
        
        $html = new Delabon\Helpers\Html();

        $markup = $html->description(
			'Description text',
			[
				'class' => '__extra_class',
				'data-id' => 3,
			]
		);

		$this->assertEquals( $markup, '<p class="dlb-input-description __extra_class" data-id="3">Description text</p>' );
	}

	// textarea
	public function test_get_textarea_markup_without_params() {
        
        $html = new Delabon\Helpers\Html();

        $markup = $html->textarea();

		$this->assertEquals( $markup, '<textarea class="dlb-input dlb-input-textarea"></textarea>' );
	}

	public function test_get_textarea_markup_with_value() {
        
        $html = new Delabon\Helpers\Html();

        $markup = $html->textarea([
			'value' => 'lets say it works'
		]);

		$this->assertEquals( $markup, '<textarea class="dlb-input dlb-input-textarea">lets say it works</textarea>' );
	}

	public function test_get_textarea_markup_with_params() {
        
        $html = new Delabon\Helpers\Html();

        $markup = $html->textarea([
			'id' => '__id',
			'class' => '__extra_class',
			'placeholder' => 'Placeholder goes here',
		]);

		$this->assertEquals( $markup, '<textarea id="__id" class="dlb-input dlb-input-textarea __extra_class" placeholder="Placeholder goes here"></textarea>' );
	}

	// select
	public function test_get_select_markup_without_items() {
        
        $html = new Delabon\Helpers\Html();

        $markup = $html->select();

		$this->assertEquals( $markup, '<select class="dlb-input dlb-input-select"></select>' );
	}

	public function test_get_select_markup_with_items() {
        
        $html = new Delabon\Helpers\Html();

        $markup = $html->select([
			'class' => '__extra_class',
			'items' => [
				1 => 'Item 1',
				2 => 'Item 2',
			]
		]);

		$this->assertEquals( $markup, '<select class="dlb-input dlb-input-select __extra_class"><option value="1">Item 1</option><option value="2">Item 2</option></select>' );
	}

	public function test_get_select_markup_with_a_selected_item() {
        
        $html = new Delabon\Helpers\Html();

        $markup = $html->select([
			'value' => 2,
			'items' => [
				1 => 'Item 1',
				2 => 'Item 2',
				3 => 'Item 3',
			]
		]);

		$this->assertEquals( $markup, '<select class="dlb-input dlb-input-select"><option value="1">Item 1</option><option value="2" selected="selected">Item 2</option><option value="3">Item 3</option></select>' );
	}

	// container
	public function test_get_container_markup_without_params() {
	
		$html = new Delabon\Helpers\Html();

		$markup = $html->container('Container');

		$this->assertEquals( $markup, '<div class="dlb-input-container">Container</div>' );
	}

	public function test_get_empty_container_markup() {
	
		$html = new Delabon\Helpers\Html();

		$markup = $html->container('');

		$this->assertEquals( $markup, '' );
	}

	public function test_get_container_markup_with_params() {
	
		$html = new Delabon\Helpers\Html();

		$markup = $html->container(
			'Container',
			[
				'id' => '__id'
			]
		);

		$this->assertEquals( $markup, '<div id="__id" class="dlb-input-container">Container</div>' );
	}
}
