(function(){dust.register("pubmed_index.dust",body_0);function body_0(chk,ctx){return chk.write("<div class='container'><h1> PubMed Article Appearing In Wikipedia</h1><table id='sorted_table' class='tablesorter'><thead><tr> <th> PMID </th><th>PubMed Title </th> <th> Source </th><th>Article Type(s)</th><th> Wiki Titles </th></tr></thead><tbody>").section(ctx.get(["articles"], false),ctx,{"block":body_1},{}).write("</div>");}function body_1(chk,ctx){return chk.write("<tr><td>").reference(ctx.get(["pubmedlinks_id"], false),ctx,"h").write(" </td><td><a target='_blank' href='/pubmed/").reference(ctx.get(["pubmedlinks_id"], false),ctx,"h").write("'>").reference(ctx.get(["title"], false),ctx,"h").write("</a>(more on <a target='_blank' href='http://www.ncbi.nlm.nih.gov/pubmed/").reference(ctx.get(["pubmedlinks_id"], false),ctx,"h").write("'> pubmed</a>) </td><td> ").reference(ctx.get(["source"], false),ctx,"h").write(" </td><td> ").section(ctx.get(["pubtype"], false),ctx,{"block":body_2},{}).write("</td><td><ul>").section(ctx.get(["found_in_wikititles"], false),ctx,{"block":body_3},{}).write("</ul></td></tr>");}function body_2(chk,ctx){return chk.reference(ctx.getPath(true, []),ctx,"h").write(" ");}function body_3(chk,ctx){return chk.write("<li><a target='_blank' href='/wiki/").reference(ctx.get(["title"], false),ctx,"h").write("'>").reference(ctx.get(["title"], false),ctx,"h").write("</a> x ").reference(ctx.get(["found_count"], false),ctx,"h").write(" more <a target='_blank' href='https://en.wikipedia.org/wiki/").reference(ctx.get(["title"], false),ctx,"h").write("'>on wp</a></li>\t");}return body_0;})();