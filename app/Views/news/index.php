<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <h1>NEWS INDEX</h1>

        <?php var_dump($news); ?>
        
        <?php foreach( $news as $n ): ?>

            <div style="border:1px solid #000;margin:5px;">
                <h3><?= $n->title ?></h3>
                <p><?= $n->body ?></p>
            </div>

        <?php endforeach; ?>

    </body>
</html>