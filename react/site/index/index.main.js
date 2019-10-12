/**
 * Defy Ma
 * defyma.com
 */
/*jshint esversion: 6 */
/*jshint ignore:start*/

import React, {Component} from 'react';
import ReactDOM from 'react-dom';

import App from '../../components/App'

class Main extends Component {
	constructor(props) {
        super(props);
        this.state = {
            isLoaded: false,
            message: ""
        };
    }

    componentDidMount() {
    	this.loadData();
    }

    loadData() {
		this.setState({
			isLoaded: false
		})

		/**
		 * $ from jQuey in global window, not from import
		 */
    	$.ajax({
    		method: 'GET',
    		url: window.__MYSITE__ + 'site/getdata',
    		type: 'json',
    		success: (result) => {
    			if(result.success) {
    				this.setState({
    					isLoaded: true,
    					message: result.message
    				})
    			}
    		},
    		error: (err) => {
    			console.log("error get data");
    		}
    	})
    }


    render() {
        return (
            <div>

                Hello From yii2-react
                <br />
                Edit This file on 'react/site/index/index.main.js'	
                <br />
                <br />
                {this.state.isLoaded ? this.state.message : "Loading ...."}
            </div>
        );
    }
}

ReactDOM.render(<App><Main /></App>, document.querySelector("#root-react"));
