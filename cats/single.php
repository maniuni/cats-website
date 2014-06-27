<?php get_header(); ?>  
<title><?php wp_title("");?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/styles/news.css" type="text/css">
</head>
<body>
<?php /* If there are no posts to display, such as an empty archive page */ ?>  
<?php if ( ! have_posts() ) : ?>  
        <h1>Страницата не е намерена.</h1>  
            <p>Съжаляваме, но страница с такова съдържание не е намерена в нашите архиви.</p>  
<?php endif; ?>  
  
<?php while ( have_posts() ) : the_post(); ?>  
  
<div id="main-content">  
    <h1 class="post-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>  
    <div class="post-details">  
        <div class="post-details-left">  
        Добавено на <strong><?php the_date("d.m.Y \в G:i"); ?></strong> от <span class="author"><?php the_author(); ?></span>  
        </div>  
        <div class="post-details-right">  
        <?php edit_post_link('Edit', '<span class="comment-count">  ' , '</span>'); ?><span class="comment-count"><?php comments_popup_link('Добави комeнтар', '1 коментар', '% коментара'); ?></span>  
        </div>  
    </div>  
    <div class="content">
            <?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>  
                    <?php the_excerpt(); ?>  
            <?php else : ?>  
                    <?php the_content('Прочети всичко...'); ?>  
            <?php endif; ?> 
    </div>
    <div class="dots"></div>  

  
<div class="spacer"></div>  
  
<?php comment_form(array( 
    'title_reply'=> 'Добави коментар',
    
    'label_submit' => 'Добави',
    
    'comment_field' =>  '<p class="comment-form-comment"><label for="comment">' . _x( 'Коментар', 'noun' ) .
    '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
    '</textarea></p>','must_log_in' => '<p class="must-log-in">' .
    sprintf(__( 'Трябва да сте <a href="%s">логнат</a> за да добавите коментар.' ),
      wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )) . '</p>',
    
    'comment_notes_before' => '<p class="comment-notes">' .
    __( 'Имейлът няма да се показва.' ) . ( $req ? $required_text : '* Задължителни полета.' ) .
    '</p>',
    'comment_notes_after' => '<p class="form-allowed-tags">' .
    sprintf(__( 'Следните HTML тагове могат да бъдат използвани:  %s' ),
      ' <code>' . allowed_tags() . '</code>' ) . '</p>',
    
    'fields' => apply_filters( 'comment_form_default_fields', array(

    'author' =>
      '<p class="comment-form-author">' .
      '<label for="author">' . __( 'Име *', 'domainreference' ) . '</label> ' .
      ( $req ? '<span class="required">*</span>' : '' ) .
      '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
      '" size="30"' . $aria_req . ' /></p>',

    'email' =>
      '<p class="comment-form-email"><label for="email">' . __( 'Имейл *', 'domainreference' ) . '</label> ' .
      ( $req ? '<span class="required">*</span>' : '' ) .
      '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
      '" size="30"' . $aria_req . ' /></p>',
    'url' =>
      '<p class="comment-form-url"><label for="url">' .
      __( 'Уебсайт', 'domainreference' ) . '</label>' .
      '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
      '" size="30" /></p>'))
  )); ?>  
  
<?php endwhile; ?>  
</div> 
<div class="spacer"></div>  
<?php get_footer(); ?>