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

global $DB;

$PAGE->set_url('/local/message/manage.php');
$PAGE->set_context(context_system::instance());

$pagetitle = get_string('managemessages', 'local_message');
$PAGE->set_title($pagetitle);

$messages = $DB->get_records('local_message');

echo $OUTPUT->header();

$data = (object)[
  'messages' => array_values($messages),
  'editurl' => new moodle_url('/local/message/edit.php'),
];

echo $OUTPUT->render_from_template('local_message/manage', $data);

echo $OUTPUT->footer();