$(document).ready(function () {
  // Paralax bacground effect
  $(function () {
    var $el = $(".parallax-background");
    $(window).on("scroll", function () {
      var scroll = $(document).scrollTop();
      $el.css({
        "background-position": "50% " + -0.4 * scroll + "px",
      });
    });
  });

  console.log(
    "localhost:8000/blog_app/post.php?post_id=" + getQueryParam("blog_id")
  );
  $("#btn-comment-delete").click(
    $.ajax({
      // call a DELETE endpoint of API
      url:
        "localhost:8000/blog_app/post.php?post_id=" + getQueryParam("blog_id"),
      method: "DELETE",
      success: function () {
        // redirect to another page
        window.location.href =
          "/blog_app/post.php?post_id=" + getQueryParam("blog_id");
      },
    })
  );

  // Add hover animation for blog posts
  $(".blog-post").hover(
    function () {
      // On mouse enter, scale up and change the background color
      $(this).css({
        transform: "scale(1.03)", // Slightly scales up the post
        "background-color": "#f5f5f5", // Changes the background color
      });
    },
    function () {
      // On mouse leave, scale back down and reset background color
      $(this).css({
        transform: "scale(1)", // Scales back to original size
        "background-color": "#fff", // Resets the background color
      });
    }
  );

  // Navigation active tab logic
  const currentPath = window.location.pathname;
  const userId = getQueryParam("user_id");
  // Add active class to the current link
  $("nav ul li a").each(function () {
    if (
      $(this).attr("href") === currentPath ||
      $(this).attr("href") === currentPath + "?user_id=" + userId
    ) {
      $(this).addClass("active");
    }
    console.log($(this).attr("href"), currentPath);
  });

  // Click event to change active state
  $("nav ul li a").on("click", function () {
    // Remove 'active' class from all links
    $("nav ul li a").removeClass("active");

    // Add 'active' class to the clicked link
    $(this).addClass("active");
  });
  // Function to get query parameters by name
  function getQueryParam(param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
  }
  // navbar hamburger toggle
  const hamburger = document.querySelector(".hamburger");
  const navLinks = document.querySelector(".nav-links");

  $(".hamburger").click(function () {
    $(".nav-links").slideToggle(); // Toggle with sliding effect
  });
});
