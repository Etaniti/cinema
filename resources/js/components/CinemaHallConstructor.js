import { Container } from 'postcss';
import React from 'react';
import ReactDOM from 'react-dom';

const cinemaHall = document.querySelector("#cinema-hall-constructor");
var rows = parseInt(cinemaHall.dataset.rows);
var seatsInRow = parseInt(cinemaHall.dataset.columns);

const seatsList = {
    columnCount: seatsInRow,
    columnWidth: '30px',
};

const rowsList = {
    height: '100%',
};

function getRowNumbers(rows) {
    var rowNumbers = [];
    for (let i = 1; i < (rows + 1); i++) {
        var newRowNumbers = rowNumbers.push(i);
        console.log(rowNumbers);
    }

    const rowItems = rowNumbers.map((row) =>
        <li key={row} className="list-group-item text-muted my-2">
            {row}
        </li>
    );

    return (
        <div>
            <ul className="d-flex flex-column justify-content-between align-items-center" style={rowsList}>{rowItems}</ul>
        </div>
    );
}

function getSeats(seatsInRow, rows) {
    var seats = [];
    var totalSeats = seatsInRow * rows;

    // function getEmpty(seat) {
    //     if (seat % seatsInRow == 0) {
    //         return (
    //             <div>
    //                 <p>break</p>
    //             </div>
    //         )
    //     }
    // }

    for (let i = 1; i < (totalSeats + 1); i++) {
        var newSeats = seats.push(i);
    }

    const seatItems = seats.map((seat) =>
        <li key={seat}>
            {/* {seat} */}
            <input type="checkbox" className="form-check-input seat my-2" name="seats[]" value={seat} />
            {/* {getEmpty(seat)} */}
        </li>
    );

    return (
        <div style={seatsList}>
            <ul className="custom-list">{seatItems}</ul>
        </div>
    );
}

function CinemaHallConstructor() {
    return (
        <div>
            <div className="d-flex flex-row justify-content-between mb-5">
                <div class="d-flex">
                    {getRowNumbers(rows)}
                </div>
                <div class="d-flex me-4">
                    {getSeats(seatsInRow, rows)}
                </div>
                <div class="d-flex">
                    {getRowNumbers(rows)}
                </div>
            </div>
            {/* <div>
                <p>rows {rows}</p>
                <p>seats in a row {seatsInRow}</p>
            </div> */}
        </div>
    );
}

export default CinemaHallConstructor;

if (document.getElementById('cinema-hall-constructor')) {
    ReactDOM.render(<CinemaHallConstructor />, document.getElementById('cinema-hall-constructor'));
}
