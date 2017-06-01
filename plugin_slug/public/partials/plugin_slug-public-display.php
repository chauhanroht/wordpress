<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       author_uri
 * @since      1.0.0
 *
 * @package    Plugin_slug
 * @subpackage Plugin_slug/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<!-- <div class="testclass"><p>welcome Hi</p></div> -->
<div class="wrap">
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>email</th>
                <th>status</th>
            </tr>
        </thead>
        <?php
           foreach ($employees as $employee) {
                ?>
                <tr>
                    <td><?= $employee->ID; ?></td>
                    <td><?= $employee->user_nicename; ?></td>
                    <td><?= $employee->user_email; ?></td>
                    <td><?= $employee->user_status; ?></td>
                </tr>
        <?php } ?>
    </table>
</div>