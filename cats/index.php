<?php get_header(); ?>
    <title><?php wp_title("");?></title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/styles/reset.css" type="text/css">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/styles/news.css" type="text/css">
</head>

<body>
    <?php query_posts( array( 'posts_per_page' => 4 ) ); ?>

    <div id="main-content">
        <pre class="php" name="code">
             <?php if(have_posts()): while(have_posts()): the_post(); ?>
        </pre>
        <div class="post">
                <h1 class="post-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                
                <div class="content"><?php if ( has_post_thumbnail() ) {the_post_thumbnail();}?><?php the_excerpt(); ?></div>

                <a class="read-more" href="<?php the_permalink(); ?>">Прочети повече...</a> 
        </div>
        <?php endwhile; endif; ?>

        <?php if ( $wp_query->max_num_pages > 1 ) : ?>  

            <div id="older-posts"><?php next_posts_link('« По-стари'); ?></div>  
            
            <div id="newer-posts"><?php previous_posts_link('По-нови »'); ?></div> 

        <?php else: ?>  

            <div id="only-page">Няма други новини</div>  

        <?php endif; ?> 
    </div>        
        
<?php get_footer(); ?> 