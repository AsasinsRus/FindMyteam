<!DOCTYPE html>
<html>
<head>
    <title>О нас - Пошук товариша для гри в онлайн-ігри</title>
    <link rel="stylesheet" href="assets/css/aboutus.css">
</head>
<body>

<?php require_once 'includes/header.php' ?>

<section id="about">
    <div class="about-content">
        <h2>Про нас</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut hendrerit tristique risus ut auctor. Morbi lacinia ullamcorper augue, eu commodo dui faucibus in. Fusce rutrum sem sit amet nisl sollicitudin scelerisque. Nullam bibendum mi id justo posuere ullamcorper. Aenean id velit nec sapien semper malesuada. Pellentesque sollicitudin tortor non nibh tempor, non accumsan elit ultricies. Ut congue pretium erat, vitae feugiat felis vulputate ut. In rhoncus sagittis tellus. Proin pellentesque tristique quam, vitae laoreet orci fermentum a. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In hac habitasse platea dictumst. Curabitur eu ipsum sit amet purus elementum gravida nec a elit. Phasellus vehicula ipsum at lorem vulputate, in facilisis dui faucibus. Suspendisse potenti. Nunc ultrices, justo ut finibus tempus, est dui aliquam lectus, et faucibus sapien est id risus.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut hendrerit tristique risus ut auctor. Morbi lacinia ullamcorper augue, eu commodo dui faucibus in. Fusce rutrum sem sit amet nisl sollicitudin scelerisque. Nullam bibendum mi id justo posuere ullamcorper. Aenean id velit nec sapien semper malesuada. Pellentesque sollicitudin tortor non nibh tempor, non accumsan elit ultricies. Ut congue pretium erat, vitae feugiat felis vul</p>
    </div>
</section>

<section class="gallery">
    <div class="gallery-item">
        <img src="assets/pics/about_gallery_1.jpg" alt="Фото 1">
    </div>
    <div class="gallery-item">
        <img src="assets/pics/about_gallery_2.jpg" alt="Фото 2">
    </div>
    <div class="gallery-item">
        <img src="assets/pics/about_gallery_3.jpg" alt="Фото 3">
    </div>
</section>

<section id="purpose">
    <div class="purpose-content">
        <h2>Для чого потрібен наш сайт</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut hendrerit tristique risus ut auctor. Morbi lacinia ullamcorper augue, eu commodo dui faucibus in. Fusce rutrum sem sit amet nisl sollicitudin scelerisque. Nullam bibendum mi id justo posuere ullamcorper. Aenean id velit nec sapien semper malesuada. Pellentesque sollicitudin tortor non nibh tempor, non accumsan elit ultricies. Ut congue pretium erat, vitae feugiat felis vulputate ut. In rhoncus sagittis tellus. Proin pellentesque tristique quam, vitae laoreet orci fermentum a. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In hac habitasse platea dictumst. Curabitur eu ipsum sit amet purus elementum gravida nec a elit. Phasellus vehicula ipsum at lorem vulputate, in facilisis dui faucibus. Suspendisse potenti. Nunc ultrices, justo ut finibus tempus, est dui aliquam lectus, et faucibus sapien est id risus.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut hendrerit tristique risus ut auctor. Morbi lacinia ullamcorper augue, eu commodo dui faucibus in. Fusce rutrum sem sit amet nisl sollicitudin scelerisque. Nullam bibendum mi id justo posuere ullamcorper. Aenean id velit nec sapien semper malesuada. Pellentesque sollicitudin tortor non nibh tempor, non accumsan elit ultricies. Ut congue pretium erat, vitae feugiat felis vulputate ut.</p>
    </div>
</section>

<section id="team">
    <div class="team-content">
        <h2>Наша команда</h2>
        <div class="team-members">
            <div class="team-member">
                <div class="member-photo">
                    <img src="team_member1.jpg" alt="Фотографія учасника команди 1">
                </div>
                <div class="member-info">
                    <h3>Ім'я учасника команди</h3>
                    <p>Посада учасника команди</p>
                </div>
            </div>
            <div class="team-member">
                <div class="member-photo">
                    <img src="team_member2.jpg" alt="Фотографія учасника команди">
                </div>
                <div class="member-info">
                    <h3>Ім'я учасника команди</h3>
                    <p>Посада учасника команди</p>
                </div>
            </div>
            <div class="team-member">
                <div class="member-photo">
                    <img src="team_member3.jpg" alt="Фотографія учасника команди">
                </div>
                <div class="member-info">
                    <h3>Ім'я учасника команди</h3>
                    <p>Посада учасника команди</p>
                </div>
            </div>
            <div class="team-member">
                <div class="member-photo">
                    <img src="team_member4.jpg" alt="Фотографія учасника команди">
                </div>
                <div class="member-info">
                    <h3>Ім'я учасника команди</h3>
                    <p>Посада учасника команди</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php' ?>

<script>
    const gallery = document.querySelector('.gallery');
    const galleryInner = document.querySelector('.gallery-inner');
    const galleryItems = document.querySelectorAll('.gallery-item');

    let isDown = false;
    let startX;
    let scrollLeft;

    gallery.addEventListener('mousedown', (e) => {
        isDown = true;
        startX = e.pageX - gallery.offsetLeft;
        scrollLeft = gallery.scrollLeft;
    });

    gallery.addEventListener('mouseleave', () => {
        isDown = false;
    });

    gallery.addEventListener('mouseup', () => {
        isDown = false;
    });

    gallery.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - gallery.offsetLeft;
        const walk = (x - startX) * 3; // Увеличьте число, чтобы изменить скорость скроллинга
        gallery.scrollLeft = scrollLeft - walk;
    });

    galleryInner.addEventListener('scroll', () => {
        if (galleryInner.scrollLeft === 0) {
            gallery.scrollLeft = 0;
        } else if (galleryInner.scrollLeft + gallery.clientWidth >= galleryInner.scrollWidth) {
            gallery.scrollLeft = galleryInner.scrollWidth;
        }
    });
</script>

</body>
</html>