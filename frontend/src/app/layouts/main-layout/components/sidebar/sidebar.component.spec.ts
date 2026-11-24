import { ComponentFixture, TestBed } from '@angular/core/testing';
import { provideRouter, RouterModule } from '@angular/router';
import { Brand } from '../brand/brand.component';
import { MainNavigation } from '../main-navigation/main-navigation.component';
import { UserActions } from '../user-actions/user-actions.component';

import { Sidebar } from './sidebar.component';

describe('Sidebar', () => {
  let component: Sidebar;
  let fixture: ComponentFixture<Sidebar>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [Sidebar, Brand, MainNavigation, UserActions],
      imports: [RouterModule],
      providers: [provideRouter([])],
    }).compileComponents();

    fixture = TestBed.createComponent(Sidebar);
    component = fixture.componentInstance;
    await fixture.whenStable();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
