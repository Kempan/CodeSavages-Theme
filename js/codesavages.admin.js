jQuery(document).ready(function ($) {
    $('#bg-color').minicolors({
        animationSpeed: 50,
        animationEasing: 'swing',
        change: null,
        changeDelay: 0,
        control: 'hue',
        defaultValue: '',
        format: 'rgb',
        hide: null,
        hideSpeed: 100,
        inline: false,
        keywords: '',
        letterCase: 'lowercase',
        opacity: true,
        position: 'bottom left',
        show: null,
        showSpeed: 100,
        theme: 'default',
        swatches: []
    });
    $('#text-color').minicolors({
        animationSpeed: 50,
        animationEasing: 'swing',
        change: null,
        changeDelay: 0,
        control: 'hue',
        defaultValue: '',
        format: 'rgb',
        hide: null,
        hideSpeed: 100,
        inline: false,
        keywords: '',
        letterCase: 'lowercase',
        opacity: true,
        position: 'bottom left',
        show: null,
        showSpeed: 100,
        theme: 'default',
        swatches: []
    });








});

// media uploader for sidebar picture
$(function () {
  let mediaUploader;
  $('#upload-button').on('click', function (e) {
    e.preventDefault();
    if (mediaUploader) {
      mediaUploader.open();
      return;
    }
    mediaUploader = wp.media.frames.file_frame = wp.media({
      title: 'Upload a profile picture',
      button: {
        text: 'Upload picture'
      },
      multiple: false
    });
    mediaUploader.on('select', function () {
      attachment = mediaUploader.state().get('selection').first().toJSON();
      $('#profile-picture').val(attachment.url);
      $('#replace-profile-picture').css('background-image', 'url(' + attachment.url + ')');
    });
    mediaUploader.open();
  });

  $('#remove-picture').on('click', function (e) {
    e.preventDefault();
    const answer = confirm("Are you sure you want to remove your Profil picture?");
    if (answer) {
      $('#profile-picture').val('');
      $('.codesavages-general-form').submit();
    }
    return;
  });
});




//mediauploader for navbar and header
$(function () {
  let mediaUploader;
  $('#upload-logo-button').on('click', function (e) {
    e.preventDefault();
    if (mediaUploader) {
      mediaUploader.open();
      return;
    }
    mediaUploader = wp.media.frames.file_frame = wp.media({
      title: 'Upload your Logo',
      button: {
        text: 'Upload logo'
      },
      multiple: false
    });
    mediaUploader.on('select', function () {
      attachment = mediaUploader.state().get('selection').first().toJSON();
      $('#navbar-logo').val(attachment.url);
      $('#replace-navbar-logo').css('background-image', 'url(' + attachment.url + ')');
    });
    mediaUploader.open();
  });

  $('#remove-logo').on('click', function (e) {
    e.preventDefault();
    const answer = confirm("Are you sure you want to remove your Logo?");
    if (answer) {
      $('#navbar-logo').val('');
      $('.codesavages-general-form').submit();
    }
    return;
  });
});