<?php get_header(); ?>

<!-- HERO -->
<header class="hero">
  <div class="eyebrow latin">Men's hair salon — Yamagata, Narusawa</div>
  <h1>
    <span class="line"><span>髪型だけじゃない。</span></span>
    <span class="line"><span>生き方を、<span class="gold">カッコよく</span>。</span></span>
  </h1>
  <p class="sub">年齢を問わず、その人らしいかっこよさを引き出す。<br>山形・成沢の、男のための隠れ家サロン。</p>
  <div class="meta">
    <span>Cut</span><span class="dot"></span><span>Perm</span><span class="dot"></span><span>Color</span><span class="dot"></span><span>Grooming</span>
  </div>
  <a class="btn" href="#reserve"><span>ご予約・お問い合わせ</span></a>
</header>

<!-- CONCEPT -->
<section class="block concept" id="concept">
  <div class="grid">
    <div class="reveal">
      <div class="kicker latin">Concept</div>
      <h2 class="h2">いい髪は、<br>いい一日の始まりになる。</h2>
      <p>鏡の前の数十分は、ただ髪を整える時間ではありません。背筋が伸び、その日の表情が変わる ── そんな「生き方そのものをカッコよくする」時間でありたいと考えています。</p>
      <p>一人ひとりの骨格・髪質・ライフスタイルに向き合い、毎朝の再現性まで含めて提案します。気負わず通える、男のための場所です。</p>
    </div>
    <div class="figure reveal">
      <div class="mark latin">H</div>
      <div class="tag latin">— Good life salon HARE</div>
    </div>
  </div>
</section>

<!-- MENU -->
<section class="block menu" id="menu">
  <div class="kicker latin reveal">Menu</div>
  <h2 class="h2 reveal">メニュー</h2>
  <div class="list reveal">
    <div class="row"><div class="name">Cut<small>カット・シャンプー・スタイリング込み</small></div><div class="price"><small>¥</small>4,800</div></div>
    <div class="row"><div class="name">Cut & Color<small>白髪ぼかし・デザインカラー対応</small></div><div class="price"><small>¥</small>8,800</div></div>
    <div class="row"><div class="name">Cut & Perm<small>ニュアンス〜しっかりパーマまで</small></div><div class="price"><small>¥</small>9,800</div></div>
    <div class="row"><div class="name">Head Spa<small>頭皮ケア・リラクゼーション</small></div><div class="price"><small>¥</small>3,300</div></div>
    <div class="row"><div class="name">Grooming<small>眉・顔まわりの仕上げ</small></div><div class="price"><small>¥</small>1,500</div></div>
  </div>
  <p class="note">※メニュー・料金はサンプルです。実際の設定に差し替えてお作りします。</p>
</section>

<!-- GALLERY -->
<section class="block gallery" id="gallery">
  <div class="kicker latin reveal">Gallery</div>
  <h2 class="h2 reveal">スタイル</h2>
  <div class="tiles reveal">
    <div class="tile" data-n="01"></div>
    <div class="tile" data-n="02"></div>
    <div class="tile" data-n="03"></div>
    <div class="tile" data-n="04"></div>
    <div class="tile" data-n="05"></div>
    <div class="tile" data-n="06"></div>
  </div>
  <p class="cap">Instagram（@hare.men.goodlife）と連携し、最新スタイルを自動で掲載できます。<span style="color:var(--ink-dim)">※画像はサンプル枠</span></p>
</section>

<!-- INFO -->
<section class="block info" id="info">
  <div class="grid">
    <div class="reveal">
      <div class="kicker latin">Access</div>
      <h2 class="h2">お店について</h2>
      <div class="item"><div class="lbl">Area</div><div class="val">山形県山形市 成沢<small>※詳細住所はお店の情報に差し替え</small></div></div>
      <div class="item"><div class="lbl">Hours</div><div class="val">10:00 − 20:00<small>※営業時間はサンプル・要差し替え</small></div></div>
      <div class="item"><div class="lbl">Closed</div><div class="val">不定休<small>※定休日はお店の情報に差し替え</small></div></div>
    </div>
    <div class="reveal">
      <div class="item"><div class="lbl">Reserve</div><div class="val">Instagram DM<small>@hare.men.goodlife のDM、またはプロフィールのご予約URLから</small></div></div>
      <div class="item"><div class="lbl">Menu for</div><div class="val">メンズ専門<small>学生から大人まで、年齢を問わず</small></div></div>
      <div class="item"><div class="lbl">Concept</div><div class="val">生き方を、カッコよく<small>髪型を超えた、ライフスタイルの提案</small></div></div>
    </div>
  </div>
</section>

<!-- NEWS -->
<section class="block news" id="news">
  <div class="kicker latin reveal">News</div>
  <h2 class="h2 reveal">お知らせ</h2>
  <div class="list reveal">
    <?php
    $hare_news = new WP_Query( array(
      'post_type'           => 'post',
      'posts_per_page'      => 5,
      'ignore_sticky_posts' => true,
    ) );
    if ( $hare_news->have_posts() ) :
      while ( $hare_news->have_posts() ) : $hare_news->the_post();
    ?>
    <a class="row" href="<?php the_permalink(); ?>">
      <span class="date latin"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></span>
      <span class="title"><?php the_title(); ?></span>
    </a>
    <?php
      endwhile;
      wp_reset_postdata();
    else :
    ?>
    <p class="empty">現在お知らせはありません</p>
    <?php endif; ?>
  </div>
</section>

<!-- CTA -->
<section class="block cta" id="reserve">
  <div class="kicker latin reveal" style="justify-content:center">Reserve</div>
  <h2 class="h2 reveal">次の自分に、会いに行く。</h2>
  <p class="reveal">ご予約・ご相談は、InstagramのDMよりお気軽にどうぞ。</p>
  <div class="reveal"><a class="btn" href="https://www.instagram.com/hare.men.goodlife/" target="_blank" rel="noopener"><span>Instagramで予約する</span></a></div>
</section>

<?php get_footer(); ?>
