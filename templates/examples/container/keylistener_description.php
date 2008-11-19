<h2 class="first">Using the Panel's "keylistener" Property</h2>

<p>The KeyListener class provides an easy way to listen for single or compound key events and fire the associated handler function. KeyListener also provides <em>enable</em> and <em>disable</em> methods that dynamically attach and detach DOM listeners to the associated element. The container classes (Panel and its subclasses) take advantage of KeyListeners using the "keylisteners" property. Any associated listeners are enabled when the Panel is shown, and disabled when the Panel is hidden.</p>

<p>In this tutorial, we will two KeyListeners: one that will hide a Panel when the escape key is pressed and one that will show the Panel when the user presses Ctrl+Y. First, we'll create a basic Panel and a KeyListener to enable when the Panel is visible.</p>

<textarea name="code" class="JScript" cols="60" rows="1">
YAHOO.example.container.panel1 = new YAHOO.widget.Panel("panel1", { xy:[150,100], visible: false } );

var kl = new YAHOO.util.KeyListener(document, { keys:27 },  							
											  { fn:YAHOO.example.container.panel1.hide,
												scope:YAHOO.example.container.panel1,
												correctScope:true } );

YAHOO.example.container.panel1.cfg.queueProperty("keylisteners", kl);
</textarea>

<p>There are several important things to note about the KeyListener and how it works with the Panel. The first argument of KeyListener's constructor is the element that the DOM event should be attached to. In both cases in this tutorial, the element will be <code>document</code> because we want our key presses to be registered document-wide, regardless of the focus.

<p>The second argument is an object literal containing data defining which keys to listen for. The "keys" argument can either be a number or an array of numbers representing the character code(s) to listen for. This literal also accepts boolean values for "ctrl", "alt", and "shift". We will use the "ctrl" argument in our second KeyListener.</p>

<p>Finally, the third argument defines the handler to be executed when a keypress is detected. This is an object literal as well and it contains three name/value pairs: "fn" represents the function to execute, "scope" represents the scope of the function's execution, and "correctScope", if true, will redefine "this" in your handler to refer the "scope" object.</p>

<p>After defining the KeyListener, we set it into the "keylisteners" property using <em>queueProperty</em>, which indicates that the KeyListeners will be applied to the Panel after it has been rendered.</p>

<p>Our next KeyListener will be created independently of the Panel. It will react to the "Y" key, which has a character code of 89, with the "Control" key depressed at the same time. After instantiating the listener, we can enable it by calling <em>enable</em> directly. Once the listener has been abled, pressing Ctrl+Y should cause the Panel to be displayed.<p>


<textarea name="code" class="JScript" cols="60" rows="1">
var kl2 = new YAHOO.util.KeyListener(document, { ctrl:true, keys:89 }, 
											   { fn:YAHOO.example.container.panel1.show, 
												 scope:YAHOO.example.container.panel1,
												 correctScope:true } );

kl2.enable();
</textarea>