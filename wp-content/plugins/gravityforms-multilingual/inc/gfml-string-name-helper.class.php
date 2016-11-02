<?php

class GFML_String_Name_Helper {

	public $field_choice;
	public $confirmation;
	public $field;
	public $field_input;
	public $field_key;
	public $notification;
	public $page_index;

	public function __construct() {
	}

	private function get_field_placeholder_parts() {
		$string_name_parts    = array();
		$string_name_parts[ ] = $this->field->type;
		$string_name_parts[ ] = $this->field->id;
		$string_name_parts[ ] = 'placeholder';

		return $string_name_parts;
	}

	private function get_field_customLabel_parts() {
		$string_name_parts    = array();
		$string_name_parts[ ] = $this->field->type;
		$string_name_parts[ ] = $this->field->id;
		$string_name_parts[ ] = 'customLabel';

		return $string_name_parts;
	}

	private function get_field_input_placeholder_parts() {
		$string_name_parts    = $this->get_field_placeholder_parts();
		$string_name_parts[ ] = 'input';
		$string_name_parts[ ] = $this->field_input[ 'id' ];

		return $string_name_parts;
	}

	private function get_field_input_customLabel_parts() {
		$string_name_parts    = $this->get_field_customLabel_parts();
		$string_name_parts[ ] = 'input';
		$string_name_parts[ ] = $this->field_input[ 'id' ];

		return $string_name_parts;
	}

	private function sanitize_string( $string_name ) {
		$max_length  = 128;
		$string_name = preg_replace( '/[ \[\]]+/', '-', $string_name );
		if ( strlen( $string_name ) > $max_length ) {
			$string_name = substr( $string_name, 0, strrpos( substr( $string_name, 0, $max_length ), ' ' ) );
		}

		return $string_name;
	}

	public function get_field_post_category() {
		return $this->sanitize_string( "field-{$this->field->id}-categoryInitialItem" );
	}

	public function get_field_post_custom_field() {
		return $this->sanitize_string( "field-{$this->field->id}-customFieldTemplate" );
	}

	public function get_field_option_basePrice() {
		return $this->sanitize_string( "{$this->field->type}-{$this->field->id}-basePrice" );
	}

	public function get_field_page_previousButton() {
		return $this->sanitize_string( "page-" . ( intval( $this->field->pageNumber ) - 1 ) . "-previousButton-{$this->field_key}" );
	}

	public function get_field_page_nextButton() {
		return $this->sanitize_string( "page-" . ( intval( $this->field->pageNumber ) - 1 ) . "-nextButton-{$this->field_key}" );
	}

	public function get_field_html() {
		return $this->sanitize_string( "field-{$this->field->id}-content" );
	}

	public function get_field_multi_input_choice_text() {
		return $this->sanitize_string( "{$this->field->type}-{$this->field->id}-choice-{$this->field_choice['text']}" );
	}

	public function get_field_multi_input_choice_price() {
		return $this->sanitize_string( "{$this->field->type}-{$this->field->id}-choice-{$this->field_choice['text']}-price" );
	}

	public function get_form_confirmation_message() {
		return $this->sanitize_string( "field-confirmation-message_" . $this->confirmation[ 'name' ] );
	}

	public function get_form_confirmation_page_id() {
		return $this->sanitize_string( "confirmation-page_" . $this->confirmation[ 'name' ] );
	}

	public function get_form_notification_subject() {
		return $this->sanitize_string( "notification-subject_" . $this->notification[ 'name' ] );
	}

	public function get_form_notification_message() {
		return $this->sanitize_string( "field-notification-message_" . $this->notification[ 'name' ] );
	}

	public function get_field_validation_message() {
		return $this->sanitize_string( 'field-' . $this->field[ 'id' ] . '-errorMessage' );
	}

	public function get_field_common() {
		return $this->sanitize_string( "field-{$this->field->id}-{$this->field_key}" );
	}

	public function get_form_pagination_page_title() {
		return $this->sanitize_string( "page-" . ( intval( $this->page_index ) + 1 ) . '-title' );
	}

	public function get_form_pagination_completion_text() {
		return $this->sanitize_string( "progressbar_completion_text" );
	}

	public function get_form_pagination_last_page_button_text() {
		return $this->sanitize_string( "lastPageButton" );
	}

	public function get_form_confirmation_redirect_url() {
		return $this->sanitize_string( "confirmation-redirect_" . $this->confirmation[ 'name' ] );
	}

	public function get_field_placeholder() {
		$string_name_parts = $this->get_field_placeholder_parts( $this->field );
		$string_name       = implode( '-', $string_name_parts );
		$string_name       = $this->sanitize_string( $string_name );

		return $string_name;
	}

	public function get_field_input_placeholder() {
		$string_name_parts = $this->get_field_input_placeholder_parts();
		$string_name       = implode( '-', $string_name_parts );
		$string_name       = $this->sanitize_string( $string_name );

		return $string_name;
	}

	public function get_field_input_customLabel() {
		$string_name_parts = $this->get_field_input_customLabel_parts();
		$string_name       = implode( '-', $string_name_parts );
		$string_name       = $this->sanitize_string( $string_name );

		return $string_name;
	}

	public function get_form_submit_button() {
		return $this->sanitize_string( "form_submit_button" );
	}

	public function get_form_title() {
		return $this->sanitize_string( "form_title" );
	}

	public function get_form_description() {
		return $this->sanitize_string( "form_description" );
	}

}