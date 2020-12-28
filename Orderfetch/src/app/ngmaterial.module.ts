import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';

import { MatFormFieldModule } from '@angular/material/form-field';
import { MatInputModule } from '@angular/material/input';
import { MatButtonModule } from '@angular/material/button';
import { MatSelectModule } from '@angular/material/select';
import { MatAutocompleteModule } from '@angular/material/autocomplete';
import { MatRadioModule } from '@angular/material/radio';
import { MatCheckboxModule } from '@angular/material/checkbox';
import { MatButtonToggleModule } from '@angular/material/button-toggle';
import { MatSidenavModule } from '@angular/material/sidenav';
import { MatDialogModule } from '@angular/material/dialog';
import { MatStepperModule } from '@angular/material/stepper';
import { MatTableModule } from '@angular/material/table';
import { MatSortModule } from '@angular/material/sort';
import { MatDatepickerModule } from '@angular/material/datepicker';
import { MatNativeDateModule } from '@angular/material/core';
import { MatChipsModule } from '@angular/material/chips';
import { MatTabsModule } from '@angular/material/tabs';
import { MatExpansionModule } from '@angular/material/expansion';
import { MatCardModule } from '@angular/material/card';

import { DragDropModule } from '@angular/cdk/drag-drop';

@NgModule({
	imports: [
        MatFormFieldModule,
        MatInputModule,
		MatButtonModule,
        MatSelectModule,
        MatAutocompleteModule,
        MatRadioModule,
        MatCheckboxModule,
        MatButtonToggleModule,
        MatSidenavModule,
        MatDialogModule,
        MatStepperModule,
        MatTableModule,
        MatSortModule,
        MatDatepickerModule,
        MatNativeDateModule,
        MatChipsModule,
        MatTabsModule,
        MatExpansionModule,
        MatCardModule,
        DragDropModule 
	],
	exports: [
        MatFormFieldModule,
        MatInputModule, 
		MatButtonModule,
        MatSelectModule,
        MatAutocompleteModule,
        MatRadioModule,
        MatCheckboxModule,
        MatButtonToggleModule,
        MatSidenavModule,
        MatDialogModule,
        MatStepperModule,
        MatTableModule,
        MatSortModule,
        MatDatepickerModule,
        MatNativeDateModule,
        MatChipsModule,
        MatTabsModule,
        MatExpansionModule,
        MatCardModule,
        DragDropModule 
	]
})
export class MaterialAppModule { }