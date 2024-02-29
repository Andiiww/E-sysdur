
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('')?>vendor/sb-admin-2/jquery/jquery.min.js"></script>
    <!-- <script src="<?= base_url('')?>vendor/sb-admin-2/bootstrap/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('')?>vendor/sb-admin-2/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('')?>js/sb-admin-2.min.js"></script>
    <!-- vertexShader -->
    <script id="js-vertex-shader" type="x-shader/x-vertex">
      attribute vec3 position;

      void main()	{
        gl_Position = vec4(position, 1.0);
      }
    </script>

    <!-- fragmentShader -->
    <script id="js-fragment-shader" type="x-shader/x-fragment">
      precision highp float;
      uniform vec2 resolution;
      uniform float time;
      uniform float xScale;
      uniform float yScale;
      uniform float distortion;

      void main() {
        vec2 p = (gl_FragCoord.xy * 2.0 - resolution) / min(resolution.x, resolution.y);
        
        float d = length(p) * distortion;
        
        float rx = p.x * (1.0 + d);
        float gx = p.x;
        float bx = p.x * (1.0 - d);

        float r = 0.05 / abs(p.y + sin((rx + time) * xScale) * yScale);
        float g = 0.05 / abs(p.y + sin((gx + time) * xScale) * yScale);
        float b = 0.05 / abs(p.y + sin((bx + time) * xScale) * yScale);
        
        gl_FragColor = vec4(r, g, b, 1.0);
      }
    </script>
    <!-- CoreUI and necessary plugins-->
    <script src="<?= base_url('assets/')?>vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="<?= base_url('assets/')?>vendors/simplebar/js/simplebar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r124/three.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dat-gui/0.7.7/dat.gui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>
    <script src="<?= base_url('assets/')?>js/backgrouds.js"></script>

  </body>
</html>