<?php

/**
 * Block Name: Document List
 */


$id = 'documentList-' . $block['id'];

$block_class = 'documentList';

if (!empty($block['className'])) {
  $block_class .= ' ' . $block['className'];
}

$documents = get_field('documents');

if ($documents) { ?>
  <div id="<?php echo $id; ?>" class="<?php echo $block_class; ?>">
    <ul>
      <?php foreach ($documents as $doc) {
        $file = get_field('file', $doc->ID);
        if ($file) { ?>
          <li><a href="<?php echo $file['url']; ?>" download>
              <div class="documentList__title">
                <?php echo $doc->post_title; ?>
              </div>
              <div class="documentList__info">
                <?php echo round(intval($file['filesize']) / 1024, 2); ?> KB
                <br />
                <?php echo $file['subtype']; ?>
              </div>
            </a></li>
      <?php }
      } ?>
    </ul>
  </div>
<?php } ?>