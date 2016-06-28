<?php

  // Get link for downloading the report
  $downloadURL = get_post_meta(get_the_ID(), 'download-url', true);

  // Only display the download section if there is a download link
  if ( !empty($downloadURL) ):
    echo '<div class="download-message">';
    $downloadMsg = get_post_meta(get_the_ID(), 'download-message', true);
    $downloadCTA = get_post_meta(get_the_ID(), 'download-cta', true);
    echo '<div>' . $downloadMsg . '</div>';
    echo '<a href="' . $downloadURL . '" class="download-link shadowed">' . $downloadCTA . '</a>';
    echo '</div>';
  endif;

 ?>