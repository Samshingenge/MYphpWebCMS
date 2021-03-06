<!DOCTYPE html>
<html>
  <head>
    <title>Popper Tutorial</title>
    <style>
      #tooltip {
        background: #333;
        color: white;
        font-weight: bold;
        padding: 4px 8px;
        font-size: 13px;
        border-radius: 4px;
        display: none;
      }

      #tooltip[data-show] {
        display: block;
      }

      #arrow,
      #arrow::before {
        position: absolute;
        width: 8px;
        height: 8px;
        z-index: -1;
      }

      #arrow::before {
        content: '';
        transform: rotate(45deg);
        background: #333;
      }

      #tooltip[data-popper-placement^='top'] > #arrow {
        bottom: -4px;
      }

      #tooltip[data-popper-placement^='bottom'] > #arrow {
        top: -4px;
      }

      #tooltip[data-popper-placement^='left'] > #arrow {
        right: -4px;
      }

      #tooltip[data-popper-placement^='right'] > #arrow {
        left: -4px;
      }
    </style>
  </head>
  <body>
    <button id="button" aria-describedby="tooltip">My button</button>
    <div id="tooltip" role="tooltip">
      My tooltip
      <div id="arrow" data-popper-arrow></div>
    </div>

    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script>
      const button = document.querySelector('#button');
      const tooltip = document.querySelector('#tooltip');

      let popperInstance = null;

      function create() {
        popperInstance = Popper.createPopper(button, tooltip, {
          modifiers: [
            {
              name: 'offset',
              options: {
                offset: [0, 8],
              },
            },
          ],
        });
      }

      function destroy() {
        if (popperInstance) {
          popperInstance.destroy();
          popperInstance = null;
        }
      }

      function show() {
        tooltip.setAttribute('data-show', '');
        create();
      }

      function hide() {
        tooltip.removeAttribute('data-show');
        destroy();
      }

      const showEvents = ['mouseenter', 'focus'];
      const hideEvents = ['mouseleave', 'blur'];

      showEvents.forEach(event => {
        button.addEventListener(event, show);
      });

      hideEvents.forEach(event => {
        button.addEventListener(event, hide);
      });
      
    </script>
  </body>
</html>
