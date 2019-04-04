/*jshint esversion: 6 */
/* jshint ignore:start */

import React, { Component } from 'react';

class Footer extends Component {

    render() {
        return (
            <div className="footer" 
            	style={{
            		position: 'fixed', 
            		left: '0', 
            		bottom: '0',
            		width: '100%',
					backgroundColor: '#6a6a98',
					color: 'white',
					textAlign: 'center'
            	}} >

			  <p>Template Yii2 React &copy; Defy M Aminuddin</p>
			
			</div>
        );
    }
}

export default Footer
