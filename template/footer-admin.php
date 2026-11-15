<script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>
 <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>
    <script>
      function formatNIS(input) {
        let value = input.value.replace(/[^0-9]/g, "");
        if (value.length > 8) {
          value = value.substring(0, 8);
        }

        let formatted = "";
        if (value.length > 0) {
          formatted += value.substring(0, 1);
        }
        if (value.length > 1) {
          formatted += "." + value.substring(1, 3);
        }
        if (value.length > 3) {
          formatted += "." + value.substring(3, 8);
        }

        input.value = formatted;
      }
    </script>
  </body>
</html>
