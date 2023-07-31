
<template>
    <section>
		<div class="container">	
			<!-- Codrops top bar -->
			<div class="main">
				<ul id="bk-list" class="bk-list clearfix">
					<li>
						<div class="bk-book book-1">
							<div class="bk-front">
								<div class="bk-cover">
									<h2>
										<span>Anthony Burghiss</span>
										<span>A Catwork Orange</span>
									</h2>
								</div>
								<div class="bk-cover-back"></div>
							</div>
							<div class="bk-page">
								<div class="bk-content bk-content-current">
									<p>Red snapper Kafue pike fangtooth humums slipmouth, salmon cutlassfish; swallower European perch mola mola sunfish, threadfin bream. Billfish hog sucker trout-perch lenok orbicular velvetfish. Delta smelt striped bass, medusafish dragon goby starry flounder cuchia round whitefish northern anchovy spadefish merluccid hake cat shark Black pickerel. Pacific cod.</p>
								</div>
								<div class="bk-content">
									<p>Whale catfish leatherjacket deep sea anglerfish grenadier sawfish pompano dolphinfish carp large-eye bream, squeaker amago. Sandroller; rough scad, tiger shovelnose catfish snubnose parasitic eel? Black bass soldierfish duckbill--Rattail Atlantic saury Blind shark California halibut; false trevally warty angler!</p>
								</div>
								<div class="bk-content">
									<p>Trahira giant wels cutlassfish snapper koi blackchin mummichog mustard eel rock bass whiff murray cod. Bigmouth buffalo ling cod giant wels, sauger pink salmon. Clingfish luderick treefish flatfish Cherubfish oldwife Indian mul gizzard shad hagfish zebra danio. Butterfly ray lizardfish ponyfish muskellunge Long-finned sand diver mullet swordfish limia ghost carp filefish.</p>
								</div>
							</div>
							<div class="bk-back">
								<p>In this nightmare vision of cats in revolt, fifteen-year-old Alex and his friends set out on a diabolical orgy of robbery, rape, torture and murder. Alex is jailed for his teenage delinquency and the State tries to reform him - but at what cost?</p>
							</div>
							<div class="bk-right"></div>
							<div class="bk-left">
								<h2>
									<span>Anthony Burghiss</span>
									<span>A Catwork Orange</span>
								</h2>
							</div>
							<div class="bk-top"></div>
							<div class="bk-bottom"></div>
						</div>
					</li>
				</ul>
				<div class="bookshelf"></div>
			</div>
		</div>
    </section>
</template>

<style >
@import "@/assets/scss/layout/comic/comic_bookactive.scss";
</style>

<script>
import PageTitle from '@/components/PageTitle.vue';
import '@/assets/js/books2.js';
// var transEndEventNames = {
// 	'WebkitTransition' : 'webkitTransitionEnd',
// 	'MozTransition' : 'transitionend',
// 	'OTransition' : 'oTransitionEnd',
// 	'msTransition' : 'MSTransitionEnd',
// 	'transition' : 'transitionend'
// }; 

// var transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ];

// var $books = $('#bk-list > li > div.bk-book');
// var booksCount = $books.length;
// var currentbook = -1; 

// import '@/assets/js/modernizr.custom.js';

// import Modernizr from 'modernizr';
import Books from '@/assets/js/books2.js';

export default {
    components: {
        PageTitle,
    },
    data() {
        return {
        };
    },
    computed: {

    },
    methods: {

    },
    mounted() {
        // Books.init();
		console.log(Books);
    },
};
</script>
