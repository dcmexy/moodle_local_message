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

require_once('../../config.php');
require_once('forms/message.php');

$PAGE->set_url('/local/message/manage.php');
$PAGE->set_context(context_system::instance());

$pagetitle = get_string('editmessages', 'local_message');
$PAGE->set_title($pagetitle);

$mform = new message_form();


// Form processing and displaying is done here
if ($mform->is_cancelled()) {
  // Handle form cancel operation, if cancel button is present on form

  // Redirect to manage page.
  redirect('/local/message/manage.php', 'You cancelled sending a message', 10);
} else if ($fromform = $mform->get_data()) {
  //In this case you process validated data. $mform->get_data() returns data posted in form.

  // Add new record into our database.
  $dataobject = new stdClass();

  $dataobject->messagetext = $fromform->messagetext;
  $dataobject->messagetype = $fromform->messagetype;

  if($DB->insert_record('local_message', $dataobject)) {
    redirect('/local/message/manage.php', 'Message saved successfully!', 10);
  }
} 

echo $OUTPUT->header();

// Displays the form
$mform->display();

echo $OUTPUT->footer();