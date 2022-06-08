<script>
    var x=0;
    function Ajoute(){
        if (x<4) {
            var el=document.createElement("div");
            el.className = "row";
            document.getElementById('Vids').appendChild(el);
            var elt=document.createElement("div");
            elt.className = "col";
            el.appendChild(elt);
            var elt2=document.createElement("input");
            elt2.type = 'text';
            elt2.name = 'video[]';
            elt2.className = "form-control my-2";
            elt.appendChild(elt2);
        }
        x++;
    }
</script>