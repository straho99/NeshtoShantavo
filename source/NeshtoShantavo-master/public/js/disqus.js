/*functions*/
function getCanonical(){var canonical=""; var links=document.getElementsByTagName("link");for (var i=0; i<links.length; i++) {if (links[i].getAttribute("rel") === "canonical") {canonical = links[i].getAttribute("href")}}return canonical;};
function getIdentifier(){var myIdentifier="";var curl=getCanonical();if(curl!=""){myIdentifier=curl.replace(/https:\/\/shantavo.com\/[a-z]+\//,"")}return myIdentifier;}
/*disqus*/
var disqus_shortname='shantavo', disqus_developer=0, disqus_url=getCanonical(), disqus_identifier=getIdentifier(), disqus_title=document.title;
(function(){var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true; dsq.src = 'https://shantavo.disqus.com/embed.js';(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);})();
/*st*/
stLight.options({publisher:"ad7d977c-51e6-46da-a806-f587dba0b791",shorten:false});