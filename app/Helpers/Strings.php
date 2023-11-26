<?php

		/**
		 * Minify given html.
		 *
		 * @param string|null $html
		 * @return string|string[]
		 */
		function minify_html($html) {
			if (!env('COMPRESS_HTML_ENABLED', true)) return $html;
			
			$html = preg_replace([
					'/^\s+/m',
					'/\s+$/m',
			], '', $html);
			
			return preg_replace('/\h{2,}/', ' ', $html);
		}	
