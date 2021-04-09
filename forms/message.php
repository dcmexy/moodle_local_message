<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see https://www.gnu.org/licenses/.

/**
 * Version details.
 *
 * @package    local_message
 * @author     Dean C.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once("$CFG->libdir/formslib.php");

class message_form extends moodleform
{
  // Add elements to form
  public function definition()
  {
    global $CFG;

    $mform = $this->_form; // Don't forget the underscore!

    $mform->addElement('text', 'messagetext', get_string('messagetext', 'local_message'), 'placeholder = "'. get_string('messagetextplaceholder', 'local_message') .'"'); // Add elements to your form
    $mform->setType('messagetext', PARAM_NOTAGS); // Set type of element
    $mform->setDefault('messagetext', ''); // Default value

    $choices = array(
      'success' => \core\output\notification::NOTIFY_SUCCESS,
      'info' => \core\output\notification::NOTIFY_INFO,
      'warning' => \core\output\notification::NOTIFY_WARNING,
      'error' => \core\output\notification::NOTIFY_ERROR
    );
    $mform->addElement('select', 'messagetype', get_string('messagetype', 'local_message'), $choices);
    $mform->setDefault('messagetype', 'info');

    $this->add_action_buttons();
  }

  //Custom validation should be added here
  function validation($data, $files) {
  return array();
  }
}