import { createElement } from "../scripts/general.js";

export function motivationPageReady() {
  $(document).ready(function () {
    const quotesDiv = $("#quotes");

    if (quotesDiv) {
      getQuotes();
    }
  });
}

export function getQuotes() {
  const quotesJSONData = "data/quotes.json";
  const categoriesArray = [
    "life",
    "hope",
    "happiness",
    "inspiration",
    "wisdom",
  ];
  let quotesArray = [];

  $.getJSON(quotesJSONData, {
    format: JSON,
  })
    .done(function (result) {
      shuffle(result);
      $.each(
        $(result)
          .filter(function (key, value) {
            return categoriesArray.indexOf(value.Category) > -1;
          })
          .slice(0, 200),
        function (key, val) {
          const quote = val.Quote;
          const author = val.Author;
          const category = val.Category;

          const quoteObj = { Quote: quote, Author: author, Category: category };
          quotesArray.push(quoteObj);
        }
      );
      paginateQuotes(quotesArray);
    })
    .fail(function (jqxhr, textStatus) {
      alert(jqxhr + ": " + textStatus);
    });
}

export function shuffle(quotesArray) {
  for (var i = 0; i < quotesArray.length - 1; i++) {
    var j = i + Math.floor(Math.random() * (quotesArray.length - i));

    var temp = quotesArray[j];
    quotesArray[j] = quotesArray[i];
    quotesArray[i] = temp;
  }
  return quotesArray;
}

export function paginateQuotes(quotes) {
  let quoteCards = [];
  $("#card-list").pagination({
    dataSource: quotes,
    pageSize: 10,
    showNavigator: true,
    showFirstOnEllipsisShow: false,
    showLastOnEllipsisShow: false,
    autoHidePrevious: true,
    autoHideNext: true,
    afterRender: function () {
      if ($("#card-list div.paginationjs").length == 1) {
        $("#card-list div.paginationjs").insertAfter("#card-list");
        $(".paginationjs").addClass("paginationjs-big pt-5");
      }
    },
    callback: function (data, pagination) {
      $("#card-list").empty();
      $.each(data, function (key, val) {
        const card = createQuoteCard(val.Quote, val.Author, val.Category);
        $("#card-list").append(card);
      });
    },
  });
}

export function createQuoteCard(quoteText, quoteAuthor, quoteCategory) {
  const card = createElement("div", {
    class: "card",
  });
  const cardHeader = createElement("div", {
    class: "card-header",
  });
  $(card).append(cardHeader);
  const category = createElement("div", {
    id: "category",
    class: "text-center",
  });
  const span = document.createElement("span");
  const p = document.createElement("p");
  $(p).text(capitaliseFirstLetter(quoteCategory));
  $(span).append(p);
  const img = createElement("img", {
    src: getCardImage(quoteCategory),
  });
  $(category).append(span, img);
  $(cardHeader).append(category);

  const cardBody = createElement("div", {
    class: "card-body",
  });
  const h2 = document.createElement("h2");
  $(h2).text('"' + quoteText + '"');
  $(cardBody).append(h2);
  $(card).append(cardBody);

  const cardFooter = createElement("div", {
    class: "card-footer",
  });
  const authorNamePrefix = createElement("div", {
    class: "author-name-prefix",
  });
  $(authorNamePrefix).text("Author");
  $(cardFooter).append(authorNamePrefix);
  $(cardFooter).append(quoteAuthor);
  $(card).append(cardFooter);
  return card;
}

export function capitaliseFirstLetter(string) {
  return string.charAt(0).toUpperCase() + string.slice(1);
}

export function getCardImage(category) {
  let imageSrc;
  switch (category) {
    case "life":
      imageSrc = "images/life-quote.jfif";
      break;
    case "happiness":
      imageSrc = "images/happiness-quote.jfif";
      break;
    case "hope":
      imageSrc = "images/hope-quote.jfif";
      break;
    case "inspiration":
      imageSrc = "images/inspiration-quote.jfif";
      break;
    case "wisdom":
      imageSrc = "images/wisdom-quote.jfif";
      break;
  }
  return imageSrc;
}

export function galleryImageClick() {
  $(".image").click(function () {
    const imageSrc = $(this).children().attr("src");
    openCarouselModal(imageSrc);
  });
}

export function openCarouselModal(src) {
  $("#gallery-modal").addClass("d-flex");
  $("#gallery-close").click(function () {
    closeCarouselModal();
  });
  $(".carousel-inner img").each(function () {
    if ($(this).attr("src") === src) {
      $(this).parent().addClass("active");
      const imgNum = $(this).attr("data-img");
      $("#gallery-img-indicator").text(imgNum + "/12");
    }
  });
}

export function closeCarouselModal() {
  $("#gallery-modal").removeClass("d-flex");
  $(".carousel-item").each(function () {
    $(this).removeClass("active");
  });
}

export function changeImgIndicator() {
  $(".carousel-control-prev, .carousel-control-next").click(function () {
    setTimeout(function () {
      const image = $(".carousel-item.active").children();
      const imgNum = $(image).attr("data-img");
      $("#gallery-img-indicator").text(imgNum + "/12");
    }, 700);
  });
}
