import { createElement } from "../scripts/general.js";

export function motivationPageReady() {
  $(document).ready(function () {
    const quotesDiv = $("#quotes");

    if (quotesDiv) {
      getQuotes();
    }
  });
}
/*
export function getQuotes() {
  const quotesJSONData = "data/quotes.json";
  const categoriesArray = [
    "life",
    "hope",
    "happiness",
    "inspiration",
    "wisdom",
  ];
  //let quotesArray = [];

  $.getJSON(quotesJSONData, {
    format: JSON,
  })
    .done(function (result) {
      //shuffle(result);
      $.each(
        $(result)
          .filter(function (key, value) {
            return categoriesArray.indexOf(value.Category) > -1;
          })
          .slice(0, 10),
        function (key, val) {
          const quote = val.Quote;
          const author = val.Author;
          const category = val.Category;

          //quotesArray.push(quote);
          createQuoteCard(quote, author, category);
        }
      );
    })
    .fail(function (jqxhr, textStatus) {
      alert(jqxhr + ": " + textStatus);
    });
}
*/

export function getQuotes() {
  const quotesJSONData = "data/quotes.json";
  const categoriesArray = [
    "life",
    "hope",
    "happiness",
    "inspiration",
    "wisdom",
  ];
  //let quotesArray = [];

  $.getJSON(quotesJSONData, {
    format: JSON,
  })
    .done(function (result) {
      //shuffle(result);
      $.each(
        $(result)
          .filter(function (key, value) {
            return categoriesArray.indexOf(value.Category) > -1;
          })
          .slice(0, 10),
        function (key, val) {
          const quote = val.Quote;
          const author = val.Author;
          const category = val.Category;

          //quotesArray.push(quote);
          createQuoteCard(quote, author, category);
        }
      );
    })
    .fail(function (jqxhr, textStatus) {
      alert(jqxhr + ": " + textStatus);
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
  $("#card-list").append(card);
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
