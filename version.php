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
 * @copyright  2021 Dean Chimezie
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

//$plugin->version = yyyymmddxx
$plugin->version   = 2021032701;
$plugin->release   = '1.0';
$plugin->cron      = 0;
$plugin->maturity  = MATURITY_STABLE;
$plugin->requires  = 2020110902.02; // Moodle 3.10 release and upwards.
$plugin->component = 'local_message';