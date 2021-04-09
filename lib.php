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

defined('MOODLE_INTERNAL') || die;

function local_message_before_footer() {
  global $DB, $USER;

  $sql = "SELECT lm.id, lm.messagetext, lm.messagetype FROM {local_message} lm
          LEFT JOIN (SELECT * FROM {local_message_read} lmx WHERE lmx.userid = :userid) lmr 
          ON lm.id = lmr.messageid
          WHERE lmr.messageid <> lm.id OR lmr.userid IS NULL";
  
  $params_array = array(
    'userid' => $USER->id,
  );

  $messages = $DB->get_records_sql($sql, $params_array);

  foreach ($messages as $message) {
    switch($message->messagetype) {
      case 'success':
        \core\notification::success($message->messagetext);
        break;
      case 'warning':
        \core\notification::warning($message->messagetext);
        break;
      case 'error':
        \core\notification::error($message->messagetext);
        break;
      default:
        \core\notification::info($message->messagetext);
    }

    // Mark as read
    $dataobject = new stdClass();
    $dataobject->messageid = $message->id;
    $dataobject->userid = $USER->id;
    $dataobject->timeread = time();
    
    $DB->insert_record('local_message_read', $dataobject);
  }
  
}
