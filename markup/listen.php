<?php
$videoIds = [
    'XXzhW9pJxpw',
    'ktmjHa6kKDE',
    'Hrt6IjH4NuY',
    'RIGRULG9hu0',
    'ojA5VKvaj5g'
];
?>
<section id="references" class="listen">
    <div class="main-wrapper">
        <div class="inner-wrapper">
            <h2>References</h2>
            <div class="gallery">
                <ul class="gallery-list" data-gallery>
                    <?php for ($i = 0; $i < count($videoIds); $i++): ?>
                        <li href="https://www.youtube.com/watch?v=<?php echo $videoIds[$i]; ?>">
                            <div class="hover-wrapper">
                                <div class="video">
                                    <img src="https://img.youtube.com/vi/<?php echo $videoIds[$i]; ?>/0.jpg">
                                    <div class="play-button"></div>
                                </div>
                            </div>
                        </li>
                    <?php endfor; ?>
                </ul>
            </div>
       </div>
    </div>
</section>