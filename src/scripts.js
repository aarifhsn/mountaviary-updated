document.addEventListener("DOMContentLoaded", function () {
  const mobileMenuButton = document.getElementById("mobile-menu");
  const mobileMenuContainer = document.querySelector(".mount_top_mobile_menu");
  const navList = document.querySelector(".mount_top_mobile_menu ul");

  if (mobileMenuButton && navList) {
    // Initially hide the menu
    navList.style.display = "none";

    mobileMenuButton.addEventListener("click", function (event) {
      event.stopPropagation();

      // Toggle visibility
      if (navList.style.display === "none" || navList.style.display === "") {
        navList.style.display = "block";
        mobileMenuButton.classList.add("active");
      } else {
        navList.style.display = "none";
        mobileMenuButton.classList.remove("active");
      }
    });

    // Close menu when clicking outside
    document.addEventListener("click", function (event) {
      if (
        !mobileMenuContainer.contains(event.target) &&
        event.target !== mobileMenuButton
      ) {
        navList.style.display = "none";
        mobileMenuButton.classList.remove("active");
      }
    });

    // Close menu when clicking a nav link
    const navLinks = navList.querySelectorAll("a");
    navLinks.forEach((link) => {
      link.addEventListener("click", function () {
        navList.style.display = "none";
        mobileMenuButton.classList.remove("active");
      });
    });
  }

  // add an icon when menu has children or sub menu
  let menuItems = document.querySelectorAll("ul li.menu-item-has-children");

  menuItems.forEach(function (menu_list) {
    let menu_icon_page = document.createElement("i");
    menu_icon_page.className = "fa-solid fa-caret-down";

    let firstChild = menu_list.firstChild;
    menu_list.insertBefore(menu_icon_page, firstChild.nextSibling);
  });

  // Masonry layout

  const grid = document.querySelector(".blog-grid");
  if (grid) {
    // Wait until all images are loaded
    imagesLoaded(grid, function () {
      new Masonry(grid, {
        itemSelector: ".blog-post",
        columnWidth: ".blog-post",
        percentPosition: true,
        gutter: 30,
      });
    });
  }

  // Case study grid
  const caseStudyButtons = document.querySelectorAll(".case-study-button");

  caseStudyButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      const content = button.nextElementSibling;
      if (content && content.classList.contains("case-study-content")) {
        content.classList.toggle("hidden");
      }
    });
  });

  // Dark Mode toggle
  const toggle = document.getElementById("dark-mode-toggle");
  const icon = document.getElementById("dark-mode-icon");
  const html = document.documentElement;

  // Load previously saved theme
  if (localStorage.getItem("theme") === "dark") {
    html.classList.add("dark");
    icon.textContent = "🌙";
  }

  toggle.addEventListener("click", () => {
    if (html.classList.contains("dark")) {
      html.classList.remove("dark");
      localStorage.setItem("theme", "light");
      icon.textContent = "🔆";
    } else {
      html.classList.add("dark");
      localStorage.setItem("theme", "dark");
      icon.textContent = "🌙";
    }
  });

  const portfolioItems = document.querySelectorAll(".portfolio-item");

  portfolioItems.forEach((item, index) => {
    // Add random delay for staggered animations
    item.style.animationDelay = `${index * 0.1}s`;

    // Enhanced hover effects
    item.addEventListener("mouseenter", function () {
      this.style.opacity = "1";
      this.style.filter = "grayscale(0%) brightness(1.1)";
      this.style.transform = "scale(1.08)";
      this.style.zIndex = "5";
    });

    item.addEventListener("mouseleave", function () {
      this.style.opacity = "0.6";
      this.style.filter = "grayscale(70%) brightness(0.7)";
      this.style.transform = "scale(1)";
      this.style.zIndex = "1";
    });

    // Add click effect for demo purposes
    item.addEventListener("click", function () {
      // You can add portfolio item click functionality here
      console.log(`Portfolio item ${index + 1} clicked`);
    });
  });

  // Add subtle parallax effect on scroll
  window.addEventListener("scroll", function () {
    const scrolled = window.pageYOffset;
    const grid = document.querySelector(".portfolio-grid");
    if (grid) {
      grid.style.transform = `translateY(${scrolled * 0.1}px)`;
    }
  });

  // Add floating animation to tech stack
  const techStack = document.querySelector(".floating-animation");
  if (techStack) {
    let isFloating = true;

    const startFloating = () => {
      if (isFloating) {
        techStack.style.transform = "translateY(-10px)";
        setTimeout(() => {
          if (isFloating) {
            techStack.style.transform = "translateY(0px)";
            setTimeout(startFloating, 2000);
          }
        }, 2000);
      }
    };

    techStack.style.transition = "transform 2s ease-in-out";
    setTimeout(startFloating, 1000);
  }

  // Expandable stack
  const btn = document.getElementById("toggleStackBtn");
  const hiddenItems = document.querySelectorAll(".extra-stack");
  let expanded = false;

  if (btn) {
    btn.addEventListener("click", function () {
      expanded = !expanded;
      hiddenItems.forEach((item) => {
        item.classList.toggle("hidden", !expanded);
      });
      btn.textContent = expanded ? "Show Less" : "Show More...";
    });
  }
});
