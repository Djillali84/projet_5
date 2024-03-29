<?php
use function OpenFram\escape_to_html as h;
use function OpenFram\u;

?>
<div class="small-header col-12 p-0 ">
    <div class="admin-header header-filter clear-filter purple-filter" data-parallax="true"
         style="background-image: url(..<?php h($post->getFeaturedImage()) ?>);">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ml-auto mr-auto">
                    <div class="brand text-center">
                        <h1><?php h($post->getTitle()) ?></h1>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<article class="main main-raised">
    <section class="section">
        <div class="container">
            <div class="row">
                <h3 class="col-md-4"><?php h($post->getSubtitle()) ?></h3>

                <p class="col-md-8 pt-md-4"><?php h($post->getContent()) ?> </p>
                <div class="col-12">
                    <p class="pt-3 float-right">
                        Publié par <a href="#" class="font-italic"> <?php h($post->getUser()->getUserName()) ?> </a>
                        - Le <?php h($post->getPublicationDate()->format('d/m/Y à H\hi\ ')) ?>
                    </p>
                </div>

            </div>

        </div>
    </section>

    <hr>

    <section class="section">
        <div class="container">
            <div class="row">

                <div class="col-12 ">

                    <h2> Commentaires <small class="float-right"><?php h(count($commentsList)) ?> commentaires</small></h2>


                    <?php foreach ($commentsList as $comment) { ?>
                    <div id="comment-<?php h($comment->getId()) ?>"
                         class="media px-3 card <?= $comment->getValid() == 0 ? 'bg-dark' : '' ?>">
                        <div class="media-body col-12 ">
                            <p class="float-right">
                                <small>Le <?php h($comment->getPublicationDate()->format('d/m/Y à H\hi\ ')) ?></small>
                            </p>

                            <h4 class="media-heading currentUser_name"><?php h($comment->getUser()->getUserName()) ?></h4>
                            <p><?php h($comment->getContent()) ?></p>
                            <?php
                            if ($comment->getValid() == 0) { ?>
                            <form action="/admin/comment-moderate-<?php h(u($comment->getId())) ?>.html" method="post">
                                <div class="form-group">
                                    <button type="submit" name="valid" class="btn btn-primary"
                                            value="<?php h($comment->getId()) ?>">
                                        Valider
                                    </button>

                            <?php } else { ?>
                                    <form action="/admin/comment-moderate-<?php h(u($comment->getId())) ?>.html" method="post">
                                        <div class="form-group">
                                            <button type="submit" name="invalid" class="btn btn-primary"
                                                    value="<?php h($comment->getId()) ?>">
                                                Cacher
                                            </button>

                            <?php } ?>

                                            <button type="submit" name="delete" value="<?php h($comment->getId()) ?>"
                                                    class="btn btn-primary">
                                                Supprimer
                                            </button>
                                        </div>
                                    </form>
                                </div>
                        </div>

                    <?php } ?>
                    </div>

                </div>
            </div>

    </section>

</article>


