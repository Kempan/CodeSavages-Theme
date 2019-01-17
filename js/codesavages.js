$(function () {

  /* Init functions */
  revealPosts();

  /* Variable declaration */
  let lastScroll = 0;

  /* Ajax functions */
  $(document).on('click', '.codesavages-load-button:not(.loading)', function () {

    const that = $(this);
    const ajaxUrl = that.data('url');
    let page = that.data('page');
    let newPage = page + 1;
    let prev = that.data('prev');
    let archive = that.data('archive');

    if (typeof prev === 'undefined') {
      prev = 0;
    }
    if (typeof archive === 'undefined') {
      archive = 0;
    }

    that.addClass('loading').find('.text').slideUp(320);
    that.find('.loader').addClass('spin');

    $.ajax({

      url: ajaxUrl,
      type: 'post',
      data: {
        page: page,
        prev: prev,
        archive: archive,
        action: 'codesavages_load_more'
      },
      error: function (response) {
        console.log(response);
      },
      success: function (response) {

        if (response == 0) {

          $('.codesavages-posts-container').append('<div class="text-center"><h3>You reached the end of the line!<p></p>No more posts to load.</h3></div>');
          that.slideUp(320);

        } else {

          setTimeout(function () {

            if (prev == 1) {
              $('.codesavages-posts-container').prepend(response);
              newPage = page - 1;
            } else {
              $('.codesavages-posts-container').append(response);
            }

            if (newPage == 1) {
              that.slideUp(320);
            } else {
              that.data('page', newPage);
              that.removeClass('loading').find('.text').slideDown(320);
              that.find('.loader').removeClass('spin');
            }

            revealPosts();

          }, 1000);
        }
      }
    });
  });

  /* Scroll Functions */

  //Kommer ihåg vart du var på sidan när du klickar in på en post
  //så att kommer tillbaks till samma ställe när du backar
  $(window).scroll(function () {
    let scroll = $(window).scrollTop();
    if (Math.abs(scroll - lastScroll) > $(window).height() * 0.1) {
      lastScroll = scroll;
      $('.page-limit').each(function (index) {
        if (isVisible($(this))) {
          history.replaceState(null, null, $(this).attr('data-page'));
          return (false);
        }
      });
    }
  });

  /* Helper Functions */

  function revealPosts() {
    const posts = $('article:not(.reveal)');
    let i = 0;
    setInterval(function () {
      if (i >= posts.length) return false;
      let el = posts[i];
      $(el).addClass('reveal');
      i++
    }, 200);
  }

  function isVisible(element) {
    const scroll_pos = $(window).scrollTop();
    const window_height = $(window).height();
    const el_top = $(element).offset().top;
    const el_height = $(element).height();
    const el_bottom = el_top + el_height;
    return ((el_bottom - el_height * 0.25 > scroll_pos) && (el_top < (scroll_pos + 0.5 * window_height)));
  }

  /* Sidebar Functions */

  $(document).on('click', '.js-toggleSidebar', function () {
    $('.codesavages-sidebar').toggleClass('sidebar-closed');
  });

});