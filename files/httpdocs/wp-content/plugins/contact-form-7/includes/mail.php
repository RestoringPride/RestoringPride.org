<?php

<<<<<<< HEAD
/**
 * Class that represents an attempt to compose and send email.
 */
=======
>>>>>>> fb785cbb (Initial commit)
class WPCF7_Mail {

	private static $current = null;

	private $name = '';
	private $locale = '';
	private $template = array();
	private $use_html = false;
	private $exclude_blank = false;

<<<<<<< HEAD

	/**
	 * Returns the singleton instance of this class.
	 */
=======
>>>>>>> fb785cbb (Initial commit)
	public static function get_current() {
		return self::$current;
	}

<<<<<<< HEAD

	/**
	 * Composes and sends email based on the specified template.
	 *
	 * @param array $template Array of email template.
	 * @param string $name Optional name of the template, such as
	 *               'mail' or 'mail_2'. Default empty string.
	 * @return bool Whether the email was sent successfully.
	 */
=======
>>>>>>> fb785cbb (Initial commit)
	public static function send( $template, $name = '' ) {
		self::$current = new self( $name, $template );
		return self::$current->compose();
	}

<<<<<<< HEAD

	/**
	 * The constructor method.
	 *
	 * @param string $name The name of the email template.
	 *               Such as 'mail' or 'mail_2'.
	 * @param array $template Array of email template.
	 */
=======
>>>>>>> fb785cbb (Initial commit)
	private function __construct( $name, $template ) {
		$this->name = trim( $name );
		$this->use_html = ! empty( $template['use_html'] );
		$this->exclude_blank = ! empty( $template['exclude_blank'] );

		$this->template = wp_parse_args( $template, array(
			'subject' => '',
			'sender' => '',
			'body' => '',
			'recipient' => '',
			'additional_headers' => '',
			'attachments' => '',
		) );

		if ( $submission = WPCF7_Submission::get_instance() ) {
			$contact_form = $submission->get_contact_form();
			$this->locale = $contact_form->locale();
		}
	}

<<<<<<< HEAD

	/**
	 * Returns the name of the email template.
	 */
=======
>>>>>>> fb785cbb (Initial commit)
	public function name() {
		return $this->name;
	}

<<<<<<< HEAD

	/**
	 * Retrieves a component from the email template.
	 *
	 * @param string $component The name of the component.
	 * @param bool $replace_tags Whether to replace mail-tags
	 *             within the component.
	 * @return string The text representation of the email component.
	 */
=======
>>>>>>> fb785cbb (Initial commit)
	public function get( $component, $replace_tags = false ) {
		$use_html = ( $this->use_html && 'body' == $component );
		$exclude_blank = ( $this->exclude_blank && 'body' == $component );

		$template = $this->template;
		$component = isset( $template[$component] ) ? $template[$component] : '';

		if ( $replace_tags ) {
			$component = $this->replace_tags( $component, array(
				'html' => $use_html,
				'exclude_blank' => $exclude_blank,
			) );

<<<<<<< HEAD
			if ( $use_html ) {
				// Convert <example@example.com> to &lt;example@example.com&gt;.
				$component = preg_replace_callback(
					'/<(.*?)>/',
					function ( $matches ) {
						if ( is_email( $matches[1] ) ) {
							return sprintf( '&lt;%s&gt;', $matches[1] );
						} else {
							return $matches[0];
						}
					},
					$component
				);

				if ( ! preg_match( '%<html[>\s].*</html>%is', $component ) ) {
					$component = $this->htmlize( $component );
				}
=======
			if ( $use_html
			and ! preg_match( '%<html[>\s].*</html>%is', $component ) ) {
				$component = $this->htmlize( $component );
>>>>>>> fb785cbb (Initial commit)
			}
		}

		return $component;
	}

<<<<<<< HEAD

	/**
	 * Creates HTML message body by adding the header and footer.
	 *
	 * @param string $body The body part of HTML.
	 * @return string Formatted HTML.
	 */
=======
>>>>>>> fb785cbb (Initial commit)
	private function htmlize( $body ) {
		if ( $this->locale ) {
			$lang_atts = sprintf( ' %s',
				wpcf7_format_atts( array(
					'dir' => wpcf7_is_rtl( $this->locale ) ? 'rtl' : 'ltr',
					'lang' => str_replace( '_', '-', $this->locale ),
				) )
			);
		} else {
			$lang_atts = '';
		}

		$header = apply_filters( 'wpcf7_mail_html_header',
			'<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml"' . $lang_atts . '>
<head>
<title>' . esc_html( $this->get( 'subject', true ) ) . '</title>
</head>
<body>
', $this );

		$footer = apply_filters( 'wpcf7_mail_html_footer',
			'</body>
</html>', $this );

<<<<<<< HEAD
		$html = $header . wpcf7_autop( $body ) . $footer;
		return $html;
	}


	/**
	 * Composes an email message and attempts to send it.
	 *
	 * @param bool $send Whether to attempt to send email. Default true.
	 */
=======
		$html = $header . wpautop( $body ) . $footer;
		return $html;
	}

>>>>>>> fb785cbb (Initial commit)
	private function compose( $send = true ) {
		$components = array(
			'subject' => $this->get( 'subject', true ),
			'sender' => $this->get( 'sender', true ),
			'body' => $this->get( 'body', true ),
			'recipient' => $this->get( 'recipient', true ),
			'additional_headers' => $this->get( 'additional_headers', true ),
			'attachments' => $this->attachments(),
		);

		$components = apply_filters( 'wpcf7_mail_components',
			$components, wpcf7_get_current_contact_form(), $this
		);

		if ( ! $send ) {
			return $components;
		}

		$subject = wpcf7_strip_newline( $components['subject'] );
		$sender = wpcf7_strip_newline( $components['sender'] );
		$recipient = wpcf7_strip_newline( $components['recipient'] );
		$body = $components['body'];
		$additional_headers = trim( $components['additional_headers'] );

		$headers = "From: $sender\n";

		if ( $this->use_html ) {
			$headers .= "Content-Type: text/html\n";
			$headers .= "X-WPCF7-Content-Type: text/html\n";
		} else {
			$headers .= "X-WPCF7-Content-Type: text/plain\n";
		}

		if ( $additional_headers ) {
			$headers .= $additional_headers . "\n";
		}

		$attachments = array_filter(
			(array) $components['attachments'],
			function ( $attachment ) {
				$path = path_join( WP_CONTENT_DIR, $attachment );

				if ( ! wpcf7_is_file_path_in_content_dir( $path ) ) {
					if ( WP_DEBUG ) {
						trigger_error(
							sprintf(
								/* translators: %s: Attachment file path. */
								__( 'Failed to attach a file. %s is not in the allowed directory.', 'contact-form-7' ),
								$path
							),
							E_USER_NOTICE
						);
					}

					return false;
				}

				if ( ! is_readable( $path ) or ! is_file( $path ) ) {
					if ( WP_DEBUG ) {
						trigger_error(
							sprintf(
								/* translators: %s: Attachment file path. */
								__( 'Failed to attach a file. %s is not a readable file.', 'contact-form-7' ),
								$path
							),
							E_USER_NOTICE
						);
					}

					return false;
				}

				static $total_size = array();

				if ( ! isset( $total_size[$this->name] ) ) {
					$total_size[$this->name] = 0;
				}

				$file_size = (int) @filesize( $path );

				if ( 25 * MB_IN_BYTES < $total_size[$this->name] + $file_size ) {
					if ( WP_DEBUG ) {
						trigger_error(
							__( 'Failed to attach a file. The total file size exceeds the limit of 25 megabytes.', 'contact-form-7' ),
							E_USER_NOTICE
						);
					}

					return false;
				}

				$total_size[$this->name] += $file_size;

				return true;
			}
		);

		return wp_mail( $recipient, $subject, $body, $headers, $attachments );
	}

<<<<<<< HEAD

	/**
	 * Replaces mail-tags within the given text.
	 */
=======
>>>>>>> fb785cbb (Initial commit)
	public function replace_tags( $content, $args = '' ) {
		if ( true === $args ) {
			$args = array( 'html' => true );
		}

		$args = wp_parse_args( $args, array(
			'html' => false,
			'exclude_blank' => false,
		) );

		return wpcf7_mail_replace_tags( $content, $args );
	}

<<<<<<< HEAD

	/**
	 * Creates an array of attachments based on uploaded files and local files.
	 */
=======
>>>>>>> fb785cbb (Initial commit)
	private function attachments( $template = null ) {
		if ( ! $template ) {
			$template = $this->get( 'attachments' );
		}

		$attachments = array();

		if ( $submission = WPCF7_Submission::get_instance() ) {
			$uploaded_files = $submission->uploaded_files();

			foreach ( (array) $uploaded_files as $name => $paths ) {
<<<<<<< HEAD
				if ( false !== strpos( $template, "[{$name}]" ) ) {
=======
				if ( false !== strpos( $template, "[${name}]" ) ) {
>>>>>>> fb785cbb (Initial commit)
					$attachments = array_merge( $attachments, (array) $paths );
				}
			}
		}

		foreach ( explode( "\n", $template ) as $line ) {
			$line = trim( $line );

			if ( '' === $line or '[' == substr( $line, 0, 1 ) ) {
				continue;
			}

			$attachments[] = path_join( WP_CONTENT_DIR, $line );
		}

		if ( $submission = WPCF7_Submission::get_instance() ) {
			$attachments = array_merge(
				$attachments,
				(array) $submission->extra_attachments( $this->name )
			);
		}

		return $attachments;
	}
}

<<<<<<< HEAD

/**
 * Replaces all mail-tags within the given text content.
 *
 * @param string $content Text including mail-tags.
 * @param string|array $args Optional. Output options.
 * @return string Result of replacement.
 */
=======
>>>>>>> fb785cbb (Initial commit)
function wpcf7_mail_replace_tags( $content, $args = '' ) {
	$args = wp_parse_args( $args, array(
		'html' => false,
		'exclude_blank' => false,
	) );

	if ( is_array( $content ) ) {
		foreach ( $content as $key => $value ) {
			$content[$key] = wpcf7_mail_replace_tags( $value, $args );
		}

		return $content;
	}

	$content = explode( "\n", $content );

	foreach ( $content as $num => $line ) {
		$line = new WPCF7_MailTaggedText( $line, $args );
		$replaced = $line->replace_tags();

		if ( $args['exclude_blank'] ) {
			$replaced_tags = $line->get_replaced_tags();

			if ( empty( $replaced_tags )
			or array_filter( $replaced_tags, 'strlen' ) ) {
				$content[$num] = $replaced;
			} else {
				unset( $content[$num] ); // Remove a line.
			}
		} else {
			$content[$num] = $replaced;
		}
	}

	$content = implode( "\n", $content );

	return $content;
}

<<<<<<< HEAD

add_action( 'phpmailer_init', 'wpcf7_phpmailer_init', 10, 1 );

/**
 * Adds custom properties to the PHPMailer object.
 */
=======
add_action( 'phpmailer_init', 'wpcf7_phpmailer_init', 10, 1 );

>>>>>>> fb785cbb (Initial commit)
function wpcf7_phpmailer_init( $phpmailer ) {
	$custom_headers = $phpmailer->getCustomHeaders();
	$phpmailer->clearCustomHeaders();
	$wpcf7_content_type = false;

	foreach ( (array) $custom_headers as $custom_header ) {
		$name = $custom_header[0];
		$value = $custom_header[1];

		if ( 'X-WPCF7-Content-Type' === $name ) {
			$wpcf7_content_type = trim( $value );
		} else {
			$phpmailer->addCustomHeader( $name, $value );
		}
	}

	if ( 'text/html' === $wpcf7_content_type ) {
		$phpmailer->msgHTML( $phpmailer->Body );
	} elseif ( 'text/plain' === $wpcf7_content_type ) {
		$phpmailer->AltBody = '';
	}
}

<<<<<<< HEAD

/**
 * Class that represents a single-line text including mail-tags.
 */
=======
>>>>>>> fb785cbb (Initial commit)
class WPCF7_MailTaggedText {

	private $html = false;
	private $callback = null;
	private $content = '';
	private $replaced_tags = array();

<<<<<<< HEAD

	/**
	 * The constructor method.
	 */
=======
>>>>>>> fb785cbb (Initial commit)
	public function __construct( $content, $args = '' ) {
		$args = wp_parse_args( $args, array(
			'html' => false,
			'callback' => null,
		) );

		$this->html = (bool) $args['html'];

		if ( null !== $args['callback']
		and is_callable( $args['callback'] ) ) {
			$this->callback = $args['callback'];
		} elseif ( $this->html ) {
			$this->callback = array( $this, 'replace_tags_callback_html' );
		} else {
			$this->callback = array( $this, 'replace_tags_callback' );
		}

		$this->content = $content;
	}

<<<<<<< HEAD

	/**
	 * Retrieves mail-tags that have been replaced by this instance.
	 *
	 * @return array List of mail-tags replaced.
	 */
=======
>>>>>>> fb785cbb (Initial commit)
	public function get_replaced_tags() {
		return $this->replaced_tags;
	}

<<<<<<< HEAD

	/**
	 * Replaces mail-tags based on regexp.
	 */
=======
>>>>>>> fb785cbb (Initial commit)
	public function replace_tags() {
		$regex = '/(\[?)\[[\t ]*'
			. '([a-zA-Z_][0-9a-zA-Z:._-]*)' // [2] = name
			. '((?:[\t ]+"[^"]*"|[\t ]+\'[^\']*\')*)' // [3] = values
			. '[\t ]*\](\]?)/';

		return preg_replace_callback( $regex, $this->callback, $this->content );
	}

<<<<<<< HEAD

	/**
	 * Callback function for replacement. For HTML message body.
	 */
=======
>>>>>>> fb785cbb (Initial commit)
	private function replace_tags_callback_html( $matches ) {
		return $this->replace_tags_callback( $matches, true );
	}

<<<<<<< HEAD

	/**
	 * Callback function for replacement.
	 */
=======
>>>>>>> fb785cbb (Initial commit)
	private function replace_tags_callback( $matches, $html = false ) {
		// allow [[foo]] syntax for escaping a tag
		if ( $matches[1] == '['
		and $matches[4] == ']' ) {
			return substr( $matches[0], 1, -1 );
		}

		$tag = $matches[0];
		$tagname = $matches[2];
		$values = $matches[3];

		$mail_tag = new WPCF7_MailTag( $tag, $tagname, $values );
		$field_name = $mail_tag->field_name();

		$submission = WPCF7_Submission::get_instance();
		$submitted = $submission
			? $submission->get_posted_data( $field_name )
			: null;

		if ( $mail_tag->get_option( 'do_not_heat' ) ) {
			$submitted = isset( $_POST[$field_name] )
				? wp_unslash( $_POST[$field_name] )
				: '';
		}

		$replaced = $submitted;

		if ( null !== $replaced ) {
			if ( $format = $mail_tag->get_option( 'format' ) ) {
				$replaced = $this->format( $replaced, $format );
			}

<<<<<<< HEAD
			$replaced = wpcf7_flat_join( $replaced, array(
				'separator' => wp_get_list_item_separator(),
			) );
=======
			$replaced = wpcf7_flat_join( $replaced );
>>>>>>> fb785cbb (Initial commit)

			if ( $html ) {
				$replaced = esc_html( $replaced );
				$replaced = wptexturize( $replaced );
			}
		}

		if ( $form_tag = $mail_tag->corresponding_form_tag() ) {
			$type = $form_tag->type;

			$replaced = apply_filters(
				"wpcf7_mail_tag_replaced_{$type}", $replaced,
				$submitted, $html, $mail_tag
			);
		}

		$replaced = apply_filters(
			'wpcf7_mail_tag_replaced', $replaced,
			$submitted, $html, $mail_tag
		);

		if ( null !== $replaced ) {
			$replaced = trim( $replaced );

			$this->replaced_tags[$tag] = $replaced;
			return $replaced;
		}

		$special = apply_filters( 'wpcf7_special_mail_tags', null,
			$mail_tag->tag_name(), $html, $mail_tag
		);

		if ( null !== $special ) {
			$this->replaced_tags[$tag] = $special;
			return $special;
		}

		return $tag;
	}

<<<<<<< HEAD

	/**
	 * Formats string based on the formatting option in the form-tag.
	 */
=======
>>>>>>> fb785cbb (Initial commit)
	public function format( $original, $format ) {
		$original = (array) $original;

		foreach ( $original as $key => $value ) {
			if ( preg_match( '/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', $value ) ) {
				$datetime = date_create( $value, wp_timezone() );

				if ( false !== $datetime ) {
					$original[$key] = wp_date( $format, $datetime->getTimestamp() );
				}
			}
		}

		return $original;
	}
<<<<<<< HEAD

}


/**
 * Class that represents a mail-tag.
 */
=======
}

>>>>>>> fb785cbb (Initial commit)
class WPCF7_MailTag {

	private $tag;
	private $tagname = '';
	private $name = '';
	private $options = array();
	private $values = array();
	private $form_tag = null;

<<<<<<< HEAD

	/**
	 * The constructor method.
	 */
=======
>>>>>>> fb785cbb (Initial commit)
	public function __construct( $tag, $tagname, $values ) {
		$this->tag = $tag;
		$this->name = $this->tagname = $tagname;

		$this->options = array(
			'do_not_heat' => false,
			'format' => '',
		);

		if ( ! empty( $values ) ) {
			preg_match_all( '/"[^"]*"|\'[^\']*\'/', $values, $matches );
			$this->values = wpcf7_strip_quote_deep( $matches[0] );
		}

		if ( preg_match( '/^_raw_(.+)$/', $tagname, $matches ) ) {
			$this->name = trim( $matches[1] );
			$this->options['do_not_heat'] = true;
		}

		if ( preg_match( '/^_format_(.+)$/', $tagname, $matches ) ) {
			$this->name = trim( $matches[1] );
			$this->options['format'] = $this->values[0];
		}
	}

<<<<<<< HEAD

	/**
	 * Returns the name part of this mail-tag.
	 */
=======
>>>>>>> fb785cbb (Initial commit)
	public function tag_name() {
		return $this->tagname;
	}

<<<<<<< HEAD

	/**
	 * Returns the form field name corresponding to this mail-tag.
	 */
=======
>>>>>>> fb785cbb (Initial commit)
	public function field_name() {
		return strtr( $this->name, '.', '_' );
	}

<<<<<<< HEAD

	/**
	 * Returns the value of the specified option.
	 */
=======
>>>>>>> fb785cbb (Initial commit)
	public function get_option( $option ) {
		return $this->options[$option];
	}

<<<<<<< HEAD

	/**
	 * Returns the values part of this mail-tag.
	 */
=======
>>>>>>> fb785cbb (Initial commit)
	public function values() {
		return $this->values;
	}

<<<<<<< HEAD

	/**
	 * Retrieves the WPCF7_FormTag object that corresponds to this mail-tag.
	 */
=======
>>>>>>> fb785cbb (Initial commit)
	public function corresponding_form_tag() {
		if ( $this->form_tag instanceof WPCF7_FormTag ) {
			return $this->form_tag;
		}

		if ( $submission = WPCF7_Submission::get_instance() ) {
			$contact_form = $submission->get_contact_form();
			$tags = $contact_form->scan_form_tags( array(
				'name' => $this->field_name(),
				'feature' => '! zero-controls-container',
			) );

			if ( $tags ) {
				$this->form_tag = $tags[0];
			}
		}

		return $this->form_tag;
	}
<<<<<<< HEAD

=======
>>>>>>> fb785cbb (Initial commit)
}
