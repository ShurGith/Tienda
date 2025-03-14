<x-layouts.page>
  <style>
      :root {
          --clr-dark: #0f172a;
          --clr-light: #f1f5f9;
          --clr-accent: #e11d48;
      }

      body {
          line-height: 1.6;
          word-spacing: 1.4px;
      }


      .container {
          display: grid;
          /*    grid-template-rows: repeat(6, 100px);
              grid-template-columns: repeat(6, 100px);*/
          width: 100%;
          margin: 0 auto;
          grid-gap: 20px 20px;
          grid-template-areas: "header header header header header"
                               "sidebar content content content content"
                               "footer footer footer footer footer";

      }

      .item {
          padding: 0.5em;
          background-color: #fb7185;
          font-weight: 700;
          color: var(--clr-light);
          border: 10px solid var(--clr-accent);
      }


      .item-1 {
          grid-row: 1 / 3;
          grid-column: 1 / 7;
      }


      .item-2 {
          grid-area: 2/4/4/6;
          z-index: 1;
      }

      .item-3 {
          grid-area: 3/1/-1/-1;
      }

      .item-4 {
          grid-area: 1/1/1/3;
      }


      #header {
          grid-area: header;
          background-color: orange;
          color: blue;
      }

      #sidebar {
          grid-area: sidebar;
          background-color: blue;
          color: red;
      }

      #content {
          grid-area: content;
          background-color: grey;
          color: white;
      }

      #footer {
          grid-area: footer;
          background-color: red;
          color: white;
      }

      @property --angle {
          syntax: '<angle>';
          inherits: false;
          initial-value: 0deg;
      }

      .cardIluminada h1 {
          font-family: "Playwrite NL";
          font-weight: 400;
          font-style: normal;
          padding-bottom: 30px;
      }

      h3 {

      }

      .cardIluminada::before, cardIluminada::after {
          content: '';
          position: absolute;
          top: 50%;
          left: 50%;
          height: 103%;
          width: 103%;
          background-image: conic-gradient(from var(--angle), transparent 85%, #ff4545, #00ff99, #0066ff, #ff0095, #ff4545);
          background-size: 100%;
          translate: -50% -50%;
          border-radius: 10px;
          animation: 3s girar linear infinite;
          z-index: 0;
      }

      .cardIluminada::before {
          filter: blur(3px+);
          opacity: 0.5;
      }

      @keyframes girar {
          0% {
              --angle: 0deg;
          }
          100% {
              --angle: 360deg;
          }
      }
  
  
  </style>
  
  <div class="container">
    <div id="header" class="item item-1">1</div>
    <div id="sidebar" class="item item-2">2</div>
    <div id="content" class="item item-3">3</div>
    <div id="footer" class="item item-4">4</div>
  </div>
  <div class="w-full mt-2 h-[950px] pb-12 bg-black flex justify-center items-center">
    <div class=" cardIluminada relative bg-black">
      <div class="w-96 mx-auto bg-black text-white  relative p-10 border border-white rounded-lg">
        <h1 class="text-5xl pb-4">Card Iluminada</h1>
        <h3 class="font-[Merriweather]">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto ducimus
          fugit ipsa maiores non
          perferendis
          quaerat qui repellat vero voluptatum? Molestias quibusdam, unde! Adipisci aperiam libero quasi recusandae
          similique, tempora. Adipisci alias architecto assumenda commodi dignissimos fuga harum hic impedit laborum,
          natus
          nesciunt nostrum odio, quibusdam reiciendis rem sed sit!</h3>
      </div>
    </div>
  </div>

</x-layouts.page>