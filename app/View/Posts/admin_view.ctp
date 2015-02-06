<!-- File: /app/View/Posts/view.ctp -->

<h1  class="text-primary"><?php echo h($post['Post']['title']); ?></h1>

<p  class="text-danger"><small>Created: <?php echo $post['Post']['created']; ?></small></p>

<p><?php echo $post['Post']['body']; ?></p>
