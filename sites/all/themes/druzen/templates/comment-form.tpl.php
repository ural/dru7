<?php if(isset($variables['user']->roles[3])) : ?>

  <div class="my_author"><?php print $author_field; ?></div>

  <div class="my_subject"><?php print $subject_field; ?></div>

  <div class="my_everything"><?php print $everything_else; ?></div>


<?php else: ?>

  <div class="wass"><?php print t('YOU HAVE TO BE ADMIN TO SEE COMMENTS'); ?></div>

<?php endif; ?>