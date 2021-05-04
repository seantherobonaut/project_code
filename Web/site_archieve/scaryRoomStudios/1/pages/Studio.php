<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<style type="text/css">

	#content h2
	{
		font-family: "Open Sans";
		font-weight: normal;
		margin-left: 3%;
		margin-right: 3%;
		padding-left: 3%;
		padding-right:3%;
		color:white;
		border-bottom:1px solid #ccc;
		padding-bottom:15px;
	}

	.desc
	{
		margin-left:7%;
		font-size: 14px;
		color:#888;
	}

	.studioWrap
	{
		margin:auto;
		text-align:center;
	}

	.equipBox
	{
		display: inline-block;
		margin:10px;
		vertical-align: top;
		text-align: left;
		width:100%;
		max-width: 250px; 
	}

	.mainbox
	{
		max-width:none;
		width:95%;
		margin:0px 20px 10px 20px;
	}

	.equipBox div
	{
		font-size: 16px;
	}

	.equipBox img
	{
		width:100%;
		border-radius: 5px;
	}

	ul
	{
		list-style-type:none;
		display: inline-block;
		margin:0;
		padding:0;
		border:1px solid #aaa;
		max-width: 248px;
		background: rgba(0, 0, 0, .7);
	}

	li
	{
		padding:2px 7px;
	}

	.specs > li::before
	{
		content: "+ ";
	}

	.specitem li::before
	{
		content: "- ";
		text-indent: 15px;
	}

	.specs { cursor: pointer; }

	.specitem
	{
		display: none;
		position: absolute;
		margin-top:2px;
		margin-left: -8px;
		width: 100%;
		max-width: 248px;
	}

	.specitem li
	{
		font-size: 12px;
	}

	.controlBreak
	{
		white-space: nowrap;
	}
</style>

<script type="text/javascript">
	$(document).ready(function()
	{
		$(".specs li").each(function()
		{
			$(this).click(function()
			{
				$(this).children('.specitem').slideToggle(0);
			});
		});
	});
</script>

<h2>Here is some of the studio's hardware!</h2>

<div class="studioWrap">
	<div class="equipBox mainbox">
		<img src="images/content/equiptment/all.jpg?random=99.99">
		<div>
			The studio - where all the magic happens
		</div>
	</div>	
	<div class="equipBox">
		<img src="images/content/equiptment/shureHeadphones.jpg?random=99.99">
		<div>
			Shure Headphones
		</div>
		<ul class="specs">
			<li>Specs
				<ul class="specitem">
					<li>Sensitivity: 107 dB/mW</li>
					<li>Maximum Input Power: 500 mW</li>
					<li>Frequency Range: 20 Hz - 20 kHz</li>
					<li>Cable Length: 6.56 ft (2M)</li>
					<li>Cable Style: Attached straight oxygen-free copper</li>
					<li>Plug: Nickel-plated 1/8" <span class="controlBreak">(3.5 mm)</span> stereo mini jack</li>
					<li>lmpedance: 38 Ω</li>
				</ul>
			</li>
		</ul>
	</div>	
	<div class="equipBox">
		<img src="images/content/equiptment/bluBirdCondenser.jpg?random=99.99">
		<div>
			Blu Bird Condenser
		</div>
		<ul class="specs">
			<li>Specs
				<ul class="specitem">
					<li>Transducer Type: Condenser, <span class="controlBreak">Pressure Gradient</span></li>
					<li>Polar Patterns: Cardioid</li>
					<li>Frequency Response: 20Hz–20 kHz</li>
					<li>Sensitivity: 27mV/Pa at ikHz <span class="controlBreak">(1 Pa = 94 dB SPL)</span></li>
					<li>Output Impedance: 50Ω</li>
					<li>Rate Load Impedance: Not less <span class="controlBreak">than 1 kΩ</span></li>
					<li>Maximum SPL: 138dB SPL <span class="controlBreak">(2.5kΩ, 0.5% THD)</span></li>
					<li>S/N Ratio: 87 dB-A (IEC 651)</li>
					<li>Noise Level: 7 dB-A (IEC 651)</li>
					<li>Dynamic Range: 131 dB (@2.5kΩ)</li>
					<li>Power Requirement: +48V DC Phantom Power (IEC 268-15)</li>
				</ul>
			</li>
		</ul>
	</div>	
	<div class="equipBox">
		<img src="images/content/equiptment/beatsHeadphones.jpg?random=99.99">
		<div>
			Beats Headphones
		</div>
	</div>	
	<div class="equipBox">
		<img src="images/content/equiptment/laptop.jpg?random=99.99">
		<div>
			Editing/Productions Laptop
		</div>
		<ul class="specs">
			<li>Specs
				<ul class="specitem">
					<li>Resolution:	1280 x 800</li>
					<li>CPU: 2.4GHz Intel <span class="controlBreak">Core 2 Duo</span></li>
					<li>RAM: 8 GB DDR2</li>
					<li>Hard Drive: 250 GB</li>
					<li>Graphics: Intel HD <span class="controlBreak">Graphics 3000</span></li>
					<li>Operating System: <span class="controlBreak">OS X 10.5.5</span></li>
				</ul>
			</li>
		</ul>
	</div>	
	<div class="equipBox">
		<img src="images/content/equiptment/kompleteUltimate.gif?random=99.99">
		<div>
			Komplete Ultimate Production Suite
		</div>
		<ul class="specs">
			<li>Included Software
				<ul class="specitem">
					<li>REAKTOR 5</li>
					<li>ROUNDS</li>
					<li>KONTOUR</li>
					<li>POLYPLEX</li>
					<li>RAZOR</li>
					<li>MONARK</li>
					<li>MASSIVE</li>
					<li>FM8</li>
					<li>SKANNER XT</li>
					<li>REAKTOR SPARK</li>
					<li>REAKTOR PRISM</li>
					<li>ABSYNTH 5</li>
					<li>RETRO MACHINES MK2</li>
					<li>More info: <a style="color:#ccc" href="https://www.native-instruments.com/en/products/komplete/bundles/komplete-10-ultimate/included-products/">Here</a></li>
				</ul>
			</li>
		</ul>
	</div>	
	<div class="equipBox">
		<img src="images/content/equiptment/audiomixer.jpg?random=99.99">
		<div>
			Scarlett Focusrite Audio Interface
		</div>
		<ul class="specs">
			<li>Specs
				<ul class="specitem">
					<li>2 in / 2 out USB audio interface</li>
					<li>96 KHz, 24-bit conversion</li>
					<li>2 Focusrite microphone preamplifiers</li>
					<li>Red anodised aluminium unibody chassis</li>
					<li>2 line/mic/instrument combination inputs – high quality XLR/¼” TRS Jack Combo</li>
					<li>2 Line/Instrument switches</li>
					<li>2 Gain knobs</li>
					<li>2 Gain halo signal indicators</li>
					<li>48V Phantom power switch</li>
					<li>Direct monitor switch</li>
					<li>Large monitor level dial</li>
					<li>USB Connection LED indicator</li>
					<li>Headphone output - ¼” TRS Jack</li>
					<li>Headphone level knob</li>
					<li>2 balanced monitor <span class="controlBreak">outputs – ¼” TRS Jack</span></li>
					<li>USB 2.0 Port</li>
					<li>Kensington Lock slot</li>
				</ul>
			</li>
		</ul>
	</div>	
	<div class="equipBox">
		<img src="images/content/equiptment/maschineStudio.jpg?random=99.99">
		<div>
			Maschine Studio Productions System
		</div>
		<ul class="specs">
			<li>Specs
				<ul class="specitem">
					<li>2 XL, high-res color displays <span class="controlBreak">(480x272 pixel)</span></li>
					<li>16 high-quality multi-color, <span class="controlBreak">illuminated pads with velocity</span> <span class="controlBreak">and aftertouch</span></li>
					<li>8 multi-color group buttons</li>
					<li>Jog wheel + LED ring (30 steps)</li>
					<li>8 endless rotary encoder</li>
					<li>58 click buttons</li>
					<li>Volume Knob</li>
					<li>LED Meters</li>
					<li>USB 2.0, 3.0</li>
					<li>1 x MIDI in, 3 x MIDI out</li>
					<li>2 x footswitch input</li>
					<li>Kensington lock</li>
				</ul>
			</li>
		</ul>
	</div>	
</div>

